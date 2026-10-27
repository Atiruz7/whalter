<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'brand_name',
    'brand_logo_path',
    'tagline',
    'hero_image_path',
    'hero_title',
    'hero_description',
    'hero_buttons',
    'hero2_background_path',
    'hero2_text',
    'hero2_video_path',
    'whatsapp_number',
    'whatsapp_message',
    'facebook_url',
    'tiktok_url',
    'credit_url',
])]
class SiteSetting extends Model
{
    protected $fillable = [
        'brand_name',
        'brand_logo_path',
        'tagline',
        'hero_image_path',
        'hero_title',
        'hero_description',
        'hero_buttons',
        'hero2_background_path',
        'hero2_text',
        'hero2_video_path',
        'whatsapp_number',
        'whatsapp_message',
        'facebook_url',
        'tiktok_url',
        'credit_url',
    ];

    protected function casts(): array
    {
        return [
            'hero_buttons' => 'array',
        ];
    }
}
