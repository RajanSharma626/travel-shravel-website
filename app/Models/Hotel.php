<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'stars',
        'location',
        'address',
        'city',
        'state',
        'country',
        'price',
        'primary_image',
        'images',
        'amenities',
        'check_in_time',
        'check_out_time',
        'room_types',
        'is_active',
        'map_url',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically generate slug on create
        static::creating(function ($hotel) {
            if (empty($hotel->slug)) {
                $hotel->slug = Str::slug($hotel->name);
                // Ensure slug is unique
                $slug = $hotel->slug;
                $count = 2;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $hotel->slug . '-' . $count;
                    $count++;
                }
                $hotel->slug = $slug;
            }
        });

        // Automatically generate slug on update if name changed
        static::updating(function ($hotel) {
            if ($hotel->isDirty('name') && !$hotel->isDirty('slug')) {
                $hotel->slug = Str::slug($hotel->name);
                $slug = $hotel->slug;
                $count = 2;
                while (static::where('slug', $slug)->where('id', '!=', $hotel->id)->exists()) {
                    $slug = $hotel->slug . '-' . $count;
                    $count++;
                }
                $hotel->slug = $slug;
            }
        });
    }

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'images' => 'array',
            'amenities' => 'array',
            'room_types' => 'array',
            'is_active' => 'boolean',
            'price' => 'decimal:2',
        ];
    }
}
