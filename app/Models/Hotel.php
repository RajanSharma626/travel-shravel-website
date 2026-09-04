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
        'hotel_rules',
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

    public const CORE_RULE_TITLES = [
        'Check-in',
        'Check-out',
        'Cancellation',
        'Pets',
        'Accepted Payment',
    ];

    /**
     * Get default set of hotel rules.
     */
    public static function defaultHotelRules(?string $checkInTime = '12:00 PM', ?string $checkOutTime = '11:00 AM'): array
    {
        $inTime = $checkInTime ?: '12:00 PM';
        $outTime = $checkOutTime ?: '11:00 AM';

        return [
            [
                'title' => 'Check-in',
                'description' => "From {$inTime}. Guests are required to show a valid government photo ID upon check-in.",
            ],
            [
                'title' => 'Check-out',
                'description' => "Until {$outTime}.",
            ],
            [
                'title' => 'Cancellation',
                'description' => 'Cancellation and prepayment policies vary according to room type. Free cancellation up to 48 hours before check-in.',
            ],
            [
                'title' => 'Pets',
                'description' => 'Pets are not allowed in the hotel premises unless prior arrangement has been made.',
            ],
            [
                'title' => 'Accepted Payment',
                'description' => 'Credit/Debit Cards (Visa, MasterCard), Net Banking, UPI, and Cash are accepted.',
            ],
        ];
    }

    /**
     * Get the 5 core rules with saved descriptions or defaults.
     */
    public function getCoreRulesAttribute(): array
    {
        $defaults = self::defaultHotelRules($this->check_in_time, $this->check_out_time);
        $saved = $this->hotel_rules;

        if (empty($saved) || !is_array($saved)) {
            return $defaults;
        }

        // Map saved rules by lowercase title
        $savedMap = [];
        foreach ($saved as $rule) {
            if (is_array($rule) && !empty($rule['title'])) {
                $savedMap[strtolower(trim($rule['title']))] = $rule['description'] ?? '';
            }
        }

        $coreRules = [];
        foreach ($defaults as $defaultRule) {
            $key = strtolower(trim($defaultRule['title']));
            $coreRules[] = [
                'title' => $defaultRule['title'],
                'description' => isset($savedMap[$key]) ? $savedMap[$key] : $defaultRule['description'],
            ];
        }

        return $coreRules;
    }

    /**
     * Get custom (non-core) rules.
     */
    public function getCustomRulesAttribute(): array
    {
        $saved = $this->hotel_rules;
        if (empty($saved) || !is_array($saved)) {
            return [];
        }

        $coreKeys = array_map('strtolower', self::CORE_RULE_TITLES);
        $custom = [];

        foreach ($saved as $rule) {
            if (is_array($rule)) {
                $title = trim($rule['title'] ?? '');
                $desc = trim($rule['description'] ?? '');
                if ($title !== '' && !in_array(strtolower($title), $coreKeys)) {
                    $custom[] = [
                        'title' => $title,
                        'description' => $desc,
                    ];
                }
            }
        }

        return $custom;
    }

    /**
     * Accessor to get formatted rules with fallback to default rules.
     */
    public function getFormattedRulesAttribute(): array
    {
        $core = $this->core_rules;
        $custom = $this->custom_rules;

        return array_merge($core, $custom);
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
            'hotel_rules' => 'array',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'price' => 'decimal:2',
        ];
    }
}
