<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'city',
        'state',
        'country',
        'price',
        'duration',
        'cancellation_policy',
        'group_size',
        'languages',
        'primary_image',
        'images',
        'highlights',
        'inclusions',
        'exclusions',
        'is_active',
        'is_featured',
        'map_url',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically generate slug on create
        static::creating(function ($activity) {
            if (empty($activity->slug)) {
                $activity->slug = Str::slug($activity->title);
                // Ensure slug is unique
                $slug = $activity->slug;
                $count = 2;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $activity->slug . '-' . $count;
                    $count++;
                }
                $activity->slug = $slug;
            }
        });

        // Automatically generate slug on update if title changed
        static::updating(function ($activity) {
            if ($activity->isDirty('title') && !$activity->isDirty('slug')) {
                $activity->slug = Str::slug($activity->title);
                $slug = $activity->slug;
                $count = 2;
                while (static::where('slug', $slug)->where('id', '!=', $activity->id)->exists()) {
                    $slug = $activity->slug . '-' . $count;
                    $count++;
                }
                $activity->slug = $slug;
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
            'highlights' => 'array',
            'inclusions' => 'array',
            'exclusions' => 'array',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'price' => 'decimal:2',
            'group_size' => 'integer',
        ];
    }
}
