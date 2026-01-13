<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_badge',
        'hero_title',
        'hero_description',
        'hero_image',
        'stat_1_number',
        'stat_1_text',
        'stat_2_number',
        'stat_2_text',
        'stat_3_number',
        'stat_3_text',
        'about_title',
        'about_description_1',
        'about_description_2',
        'about_image',
        'cta_title',
        'cta_description',
        'phone',
        'email',
        'address',
        'operational_hours',
        'instagram_url',
        'whatsapp_url',
    ];
}