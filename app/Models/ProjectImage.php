<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class ProjectImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'image_path',
        'alt_text',
        'caption',
        'display_order',
    ];

    protected $casts = [
        'display_order' => 'integer',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function getImageUrlAttribute(): string
    {
        if (Str::startsWith($this->image_path, ['http://', 'https://'])) {
            return $this->image_path;
        }
        if (Str::startsWith($this->image_path, 'assets/')) {
            return asset($this->image_path);
        }
        return asset('storage/' . $this->image_path);
    }
}
