<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Project;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class HindfanSystemTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    public function test_homepage_loads_successfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Hindson Industries', false);
        $response->assertSee('CHIDHI', false);
        $response->assertSee('Madhani', false);
        $response->assertSee('सावधान', false);
    }

    public function test_about_page_loads()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('Ashok Hind');
        $response->assertSee('Vishal Hind');
    }

    public function test_legacy_about_us_redirect_works()
    {
        $response = $this->get('/about-us');
        $response->assertStatus(200);
    }

    public function test_services_catalog_page_loads()
    {
        $response = $this->get('/services');
        $response->assertStatus(200);
        $response->assertSee('Heavy Duty Pedestal Fans');
    }

    public function test_portfolio_listing_page_loads_published_projects_only()
    {
        $response = $this->get('/portfolio');
        $response->assertStatus(200);
        $response->assertSee('CHIDHI 21" Heavy Duty Industrial Pedestal Fan');

        // Draft project must NOT appear on public portfolio
        $response->assertDontSee('Next-Gen Solar DC Pedestal Prototype');
    }

    public function test_portfolio_category_filter()
    {
        $response = $this->get('/portfolio?category=madhani-churners');
        $response->assertStatus(200);
        $response->assertSee('ELEGANT Domestic Madhani Churner');
    }

    public function test_portfolio_search_works()
    {
        $response = $this->get('/portfolio?search=CHIDHI');
        $response->assertStatus(200);
        $response->assertSee('CHIDHI 21" Heavy Duty Industrial Pedestal Fan');
    }

    public function test_project_detail_page_loads_and_increments_views()
    {
        $project = Project::where('slug', 'chidhi-21-heavy-duty-industrial-pedestal-fan')->first();
        $this->assertNotNull($project);
        $initialViews = $project->views_count;

        $response = $this->get('/portfolio/' . $project->slug);
        $response->assertStatus(200);
        $response->assertSee($project->title);

        $project->refresh();
        $this->assertEquals($initialViews + 1, $project->views_count);
    }

    public function test_draft_project_returns_404_on_public_route()
    {
        $draft = Project::where('status', 'draft')->first();
        if ($draft) {
            $response = $this->get('/portfolio/' . $draft->slug);
            $response->assertStatus(404);
        }
    }

    public function test_contact_form_submits_and_creates_inquiry()
    {
        $response = $this->post('/contact', [
            'name' => 'Automated Test User',
            'email' => 'testuser@example.com',
            'phone' => '+91-9876543210',
            'subject' => 'Inquiry for Industrial Fans',
            'service_needed' => 'Pedestal Fans',
            'message' => 'This is a test inquiry message with more than 10 characters to test backend validation.',
        ]);

        $response->assertRedirect('/contact');
        $this->assertDatabaseHas('inquiries', [
            'email' => 'testuser@example.com',
            'name' => 'Automated Test User',
        ]);
    }

    public function test_contact_honeypot_traps_spam()
    {
        $response = $this->post('/contact', [
            'name' => 'Spam Bot',
            'email' => 'bot@spammer.com',
            'message' => 'Spam link here http://spam.com',
            'website_hp' => 'http://spam.com', // Filled honeypot
        ]);

        $response->assertRedirect('/contact');
        $this->assertDatabaseMissing('inquiries', [
            'email' => 'bot@spammer.com',
        ]);
    }

    public function test_sitemap_xml_renders()
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $response->assertSee('<urlset', false);
    }

    public function test_robots_txt_renders()
    {
        $response = $this->get('/robots.txt');
        $response->assertStatus(200);
        $response->assertSee('User-agent: *');
        $response->assertSee('Disallow: /admin');
    }

    public function test_admin_guest_redirected_to_login()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_can_login_with_correct_credentials()
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@hindfan.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_admin_can_create_new_portfolio_project_with_images()
    {
        $admin = User::where('email', 'admin@hindfan.com')->first();
        $category = Category::first();

        $fakeThumb = UploadedFile::fake()->image('test-fan.jpg', 600, 600);
        $fakeGallery1 = UploadedFile::fake()->image('gallery1.jpg', 600, 600);
        $fakeGallery2 = UploadedFile::fake()->image('gallery2.jpg', 600, 600);

        $response = $this->actingAs($admin)->post('/admin/portfolio', [
            'title' => 'Brand New Test High Speed Fan',
            'slug' => 'brand-new-test-high-speed-fan',
            'category_id' => $category->id,
            'short_description' => 'Test project short description',
            'description' => '<p>Test project full specs description</p>',
            'thumbnail' => $fakeThumb,
            'gallery_images' => [$fakeGallery1, $fakeGallery2],
            'technologies' => 'Copper Winding, 1400 RPM, Double Bearing',
            'client_name' => 'Test Client',
            'status' => 'published',
            'is_featured' => 1,
            'display_order' => 99,
        ]);

        $response->assertRedirect('/admin/portfolio');
        $this->assertDatabaseHas('projects', [
            'slug' => 'brand-new-test-high-speed-fan',
            'status' => 'published',
            'is_featured' => 1,
        ]);

        $createdProject = Project::where('slug', 'brand-new-test-high-speed-fan')->first();
        $this->assertNotNull($createdProject);
        $this->assertEquals(2, $createdProject->images()->count());

        // Test public visibility of the newly published project
        $pubResponse = $this->get('/portfolio/' . $createdProject->slug);
        $pubResponse->assertStatus(200);
        $pubResponse->assertSee('Brand New Test High Speed Fan');

        // Test toggle status to draft
        $this->actingAs($admin)->post('/admin/portfolio/' . $createdProject->id . '/toggle-status');
        $createdProject->refresh();
        $this->assertEquals('draft', $createdProject->status);

        // Once in draft, public detail page must return 404
        $draftResponse = $this->get('/portfolio/' . $createdProject->slug);
        $draftResponse->assertStatus(404);

        // Test update project
        $editThumb = UploadedFile::fake()->image('updated-fan.jpg', 600, 600);
        $updateResp = $this->actingAs($admin)->put('/admin/portfolio/' . $createdProject->id, [
            'title' => 'Updated High Speed Fan Title',
            'slug' => 'updated-high-speed-fan-title',
            'category_id' => $category->id,
            'short_description' => 'Updated short description',
            'description' => '<p>Updated description</p>',
            'thumbnail' => $editThumb,
            'technologies' => 'Upgraded Copper Motor',
            'status' => 'published',
            'is_featured' => 0,
            'display_order' => 10,
        ]);
        $updateResp->assertRedirect('/admin/portfolio');
        $createdProject->refresh();
        $this->assertEquals('Updated High Speed Fan Title', $createdProject->title);

        // Test delete individual gallery image
        $galleryImage = $createdProject->images()->first();
        if ($galleryImage) {
            $delImgResp = $this->actingAs($admin)->delete('/admin/portfolio/images/' . $galleryImage->id);
            $delImgResp->assertRedirect();
            $this->assertDatabaseMissing('project_images', ['id' => $galleryImage->id]);
        }

        // Test delete project
        $this->actingAs($admin)->delete('/admin/portfolio/' . $createdProject->id);
        $this->assertDatabaseMissing('projects', ['id' => $createdProject->id]);
    }

    public function test_admin_can_manage_categories()
    {
        $admin = User::where('email', 'admin@hindfan.com')->first();

        // Create category
        $resp = $this->actingAs($admin)->post('/admin/categories', [
            'name' => 'Custom Industrial Heavy Blowers',
            'slug' => 'custom-industrial-heavy-blowers',
            'description' => 'Test category for blowers',
            'display_order' => 12,
        ]);
        $resp->assertRedirect('/admin/categories');
        $this->assertDatabaseHas('categories', ['slug' => 'custom-industrial-heavy-blowers']);

        $category = Category::where('slug', 'custom-industrial-heavy-blowers')->first();

        // Update category
        $updateResp = $this->actingAs($admin)->put('/admin/categories/' . $category->id, [
            'name' => 'Updated Blowers Division',
            'slug' => 'updated-blowers-division',
            'description' => 'Updated description',
            'display_order' => 15,
            'is_active' => 1,
        ]);
        $updateResp->assertRedirect('/admin/categories');
        $category->refresh();
        $this->assertEquals('Updated Blowers Division', $category->name);

        // Delete category
        $delResp = $this->actingAs($admin)->delete('/admin/categories/' . $category->id);
        $delResp->assertRedirect('/admin/categories');
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_admin_can_view_and_delete_inquiries()
    {
        $admin = User::where('email', 'admin@hindfan.com')->first();
        $inquiry = Inquiry::first();
        $this->assertNotNull($inquiry);

        // View inquiry (marks as read)
        $resp = $this->actingAs($admin)->get('/admin/inquiries/' . $inquiry->id);
        $resp->assertStatus(200);
        $resp->assertSee($inquiry->name);
        $inquiry->refresh();
        $this->assertTrue((bool)$inquiry->is_read);

        // Delete inquiry
        $delResp = $this->actingAs($admin)->delete('/admin/inquiries/' . $inquiry->id);
        $delResp->assertRedirect('/admin/inquiries');
        $this->assertDatabaseMissing('inquiries', ['id' => $inquiry->id]);
    }

    public function test_admin_can_view_settings_page()
    {
        $admin = User::where('email', 'admin@hindfan.com')->first();
        $response = $this->actingAs($admin)->get('/admin/settings');
        $response->assertStatus(200);
        $response->assertSee('Website Settings');
        $response->assertSee('Factory & Office Contact Info', false);
        $response->assertSee('Social Media Profiles', false);
    }

    public function test_admin_can_update_settings_and_empty_fields_are_hidden_from_frontend()
    {
        $admin = User::where('email', 'admin@hindfan.com')->first();

        // Update settings with some values filled and others emptied
        $response = $this->actingAs($admin)->put('/admin/settings', [
            'contact_address' => 'Custom Industrial Area, Phase 2, Punjab',
            'contact_phone_1' => '+91-92162-07097',
            'contact_phone_1_label' => 'Sales & Technical Support',
            'contact_phone_2' => '', // EMPTIED
            'contact_phone_2_label' => '',
            'contact_email' => 'hindfan@yahoo.com',
            'working_hours' => 'Mon - Fri: 09:00 - 18:00',
            'social_facebook' => 'https://facebook.com/customhindfanofficial',
            'social_youtube' => '', // EMPTIED
            'social_instagram' => '', // EMPTIED
            'social_linkedin' => '', // EMPTIED
            'social_twitter' => '', // EMPTIED
            'social_whatsapp' => '+919216207097',
        ]);

        $response->assertRedirect('/admin/settings');
        $response->assertSessionHas('success');

        // Verify setting in database
        $this->assertEquals('+91-92162-07097', Setting::get('contact_phone_1'));
        $this->assertEquals('hindfan@yahoo.com', Setting::get('contact_email'));
        $this->assertNull(Setting::get('contact_phone_2'));
        $this->assertNull(Setting::get('social_youtube'));

        // Verify Homepage Frontend rendering
        $home = $this->get('/');
        $home->assertStatus(200);
        $home->assertSee('+91-92162-07097');
        $home->assertSee('hindfan@yahoo.com');
        $home->assertSee('https://facebook.com/customhindfanofficial');
        // Empty items should NOT be present
        $home->assertDontSee('title="YouTube"');
        $home->assertDontSee('title="Instagram"');
        $home->assertDontSee('title="LinkedIn"');

        // Verify Contact Us page rendering
        $contact = $this->get('/contact');
        $contact->assertStatus(200);
        $contact->assertSee('Custom Industrial Area, Phase 2, Punjab');
        $contact->assertSee('+91-92162-07097');
        $contact->assertSee('Sales & Technical Support');
        $contact->assertSee('hindfan@yahoo.com');
    }
}
