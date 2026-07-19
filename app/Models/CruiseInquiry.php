<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CruiseInquiry extends Model
{
    protected $fillable = [
        'cruise_name',
        'origin',
        'destination',
        'travel_date',
        'cabin_type',
        'name',
        'mobile',
        'email',
        'persons',
    ];
}
