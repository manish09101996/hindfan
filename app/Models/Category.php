<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class)->orderBy('display_order');
    }

    public function publishedProjects(): HasMany
    {
        return $this->hasMany(Project::class)
            ->where('status', 'published')
            ->orderBy('display_order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('display_order');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
}
