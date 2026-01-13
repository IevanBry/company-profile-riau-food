<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    protected $fillable = [
        'image',
        'description_1',
        'description_2',
        'description_3',
        'years_established',
        'total_products',
        'original_guarantee',
        'vision',
        'mission_1',
        'mission_2',
        'mission_3',
        'mission_4',
        'address',
        'phone',
        'email',
        'map_url',
        'operating_hours',
        'holiday_status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}