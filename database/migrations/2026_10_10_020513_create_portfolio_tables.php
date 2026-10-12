<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 2. Projects table
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('client_name')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('external_url')->nullable();
            $table->string('technologies')->nullable(); // comma-separated or tags
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('status')->default('draft'); // 'draft' or 'published'
            $table->integer('display_order')->default(0);
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
        });

        // 3. Project Images (gallery)
        Schema::create('project_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
            $table->string('image_path');
            $table->string('alt_text')->nullable();
            $table->string('caption')->nullable();
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        // 4. Inquiries table
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('subject')->nullable();
            $table->string('service_needed')->nullable();
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });

        // 5. Add is_admin to users if not present
        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'is_admin')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_admin')->default(false)->after('password');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('users') && Schema::hasColumn('users', 'is_admin')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('is_admin');
            });
        }
        Schema::dropIfExists('inquiries');
        Schema::dropIfExists('project_images');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('categories');
    }
};
