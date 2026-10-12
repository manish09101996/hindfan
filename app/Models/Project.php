<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'short_description',
        'description',
        'thumbnail',
        'alt_text',
        'client_name',
        'completion_date',
        'external_url',
        'technologies',
        'meta_title',
        'meta_description',
        'is_featured',
        'status',
        'display_order',
        'views_count',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'display_order' => 'integer',
        'views_count' => 'integer',
        'completion_date' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)->orderBy('display_order');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getThumbnailUrlAttribute(): string
    {
        if (!empty($this->thumbnail)) {
            if (Str::startsWith($this->thumbnail, ['http://', 'https://'])) {
                return $this->thumbnail;
            }
            if (Str::startsWith($this->thumbnail, 'assets/')) {
                return asset($this->thumbnail);
            }
            return asset('storage/' . $this->thumbnail);
        }

        return asset('assets/images/placeholder-project.jpg');
    }

    public function getTechnologiesListAttribute(): array
    {
        if (empty($this->technologies)) {
            return [];
        }

        return array_map('trim', explode(',', $this->technologies));
    }

    public function getFormattedDateAttribute(): ?string
    {
        return $this->completion_date ? $this->completion_date->format('F Y') : null;
    }

    public function previousProject()
    {
        return static::where('status', 'published')
            ->where('id', '<', $this->id)
            ->orderBy('id', 'desc')
            ->first();
    }

    public function nextProject()
    {
        return static::where('status', 'published')
            ->where('id', '>', $this->id)
            ->orderBy('id', 'asc')
            ->first();
    }

    public function relatedProjects($limit = 3)
    {
        return static::where('status', 'published')
            ->where('id', '!=', $this->id)
            ->where('category_id', $this->category_id)
            ->orderBy('display_order')
            ->limit($limit)
            ->get();
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $baseSlug = Str::slug($project->title);
                $slug = $baseSlug;
                $counter = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }
                $project->slug = $slug;
            }
        });
    }
}
