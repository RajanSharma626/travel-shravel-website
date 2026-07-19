<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusInquiry extends Model
{
    protected $fillable = [
        'origin',
        'destination',
        'travel_date',
        'seat_type',
        'name',
        'mobile',
        'email',
        'persons',
    ];
}
