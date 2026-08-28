<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'avatar',
        'initials',
        'avatar_bg',
        'rating',
        'content',
        'order',
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'rating' => 'decimal:1',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }
}
