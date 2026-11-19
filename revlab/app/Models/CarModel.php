<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'year',
        'country',
        'production_numbers',
        'horsepower',
        'torque_nm',
        'zero_to_hundred_s',
        'top_speed_kmh',
        'engine',
        'transmission',
        'drivetrain',
        'weight_kg',
        'chassis',
        'aero_highlight',
        'description',
        'sketchfab_url',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getSketchfabEmbedUrlAttribute(): ?string
    {
        if (! $this->sketchfab_url) {
            return null;
        }

        if (preg_match('/([a-f0-9]{32})$/i', trim($this->sketchfab_url), $matches)) {
            $id = $matches[1];
            return "https://sketchfab.com/models/{$id}/embed?autostart=1&ui_theme=dark&ui_infos=0&ui_watermark=0&dnt=1";
        }

        return null;
    }
}