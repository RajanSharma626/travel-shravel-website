<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainInquiry extends Model
{
    protected $fillable = [
        'origin',
        'destination',
        'travel_date',
        'name',
        'mobile',
        'email',
        'persons',
        'quota',
        'travel_class',
    ];
}
