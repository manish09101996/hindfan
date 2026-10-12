<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'service_needed',
        'message',
        'is_read',
        'ip_address',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}
