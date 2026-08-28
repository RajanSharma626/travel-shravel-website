<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tour extends Model
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
        'duration_days',
        'duration_nights',
        'tour_type',
        'group_size',
        'languages',
        'primary_image',
        'images',
        'highlights',
        'itinerary',
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
        static::creating(function ($tour) {
            if (empty($tour->slug)) {
                $tour->slug = Str::slug($tour->title);
                // Ensure slug is unique
                $slug = $tour->slug;
                $count = 2;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $tour->slug . '-' . $count;
                    $count++;
                }
                $tour->slug = $slug;
            }
        });

        // Automatically generate slug on update if title changed
        static::updating(function ($tour) {
            if ($tour->isDirty('title') && !$tour->isDirty('slug')) {
                $tour->slug = Str::slug($tour->title);
                $slug = $tour->slug;
                $count = 2;
                while (static::where('slug', $slug)->where('id', '!=', $tour->id)->exists()) {
                    $slug = $tour->slug . '-' . $count;
                    $count++;
                }
                $tour->slug = $slug;
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
            'itinerary' => 'array',
            'inclusions' => 'array',
            'exclusions' => 'array',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'price' => 'decimal:2',
            'duration_days' => 'integer',
            'duration_nights' => 'integer',
            'group_size' => 'integer',
        ];
    }

    /**
     * Get the formatted duration attribute.
     */
    public function getDurationAttribute(): string
    {
        if ($this->duration_days > 0 && $this->duration_nights > 0) {
            return "{$this->duration_days} Days / {$this->duration_nights} Nights";
        }
        if ($this->duration_days > 0) {
            return $this->duration_days . ' ' . ($this->duration_days == 1 ? 'Day' : 'Days');
        }
        if ($this->duration_nights > 0) {
            return $this->duration_nights . ' ' . ($this->duration_nights == 1 ? 'Night' : 'Nights');
        }
        return 'Custom';
    }
}

