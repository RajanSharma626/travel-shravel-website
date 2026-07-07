<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'price',
        'passengers',
        'transmission',
        'bags',
        'doors',
        'description',
        'primary_image',
        'images',
        'features',
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
        static::creating(function ($car) {
            if (empty($car->slug)) {
                $car->slug = Str::slug($car->name);
                // Ensure slug is unique
                $slug = $car->slug;
                $count = 2;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $car->slug . '-' . $count;
                    $count++;
                }
                $car->slug = $slug;
            }
        });

        // Automatically generate slug on update if name changed
        static::updating(function ($car) {
            if ($car->isDirty('name') && !$car->isDirty('slug')) {
                $car->slug = Str::slug($car->name);
                $slug = $car->slug;
                $count = 2;
                while (static::where('slug', $slug)->where('id', '!=', $car->id)->exists()) {
                    $slug = $car->slug . '-' . $count;
                    $count++;
                }
                $car->slug = $slug;
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
            'features' => 'array',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'price' => 'decimal:2',
            'passengers' => 'integer',
            'bags' => 'integer',
            'doors' => 'integer',
        ];
    }
}
