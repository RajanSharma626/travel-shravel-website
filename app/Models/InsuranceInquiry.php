<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuranceInquiry extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'dob',
        'travel_plan',
        'travel_type',
        'start_date',
        'end_date',
        'country',
        'pincode',
        'ped',
    ];
}
