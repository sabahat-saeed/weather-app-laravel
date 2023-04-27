<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    use HasFactory;

    protected $table = 'weather_data';

    protected $fillable = [
        'time',
        'name',
        'latitude',
        'longitude',
        'temp',
        'pressure',
        'humidity',
        'temp_min',
        'temp_max'
    ];
}
