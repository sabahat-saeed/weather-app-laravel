<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Models\WeatherData;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class WeatherDataController extends Controller
{

    protected $signature = 'weather:fetch';

    protected $description = 'Fetches weather data for the given locations';

    private $locations = [
        [
            'name' => 'Berlin Mitte',
            'lat' => '52.520008',
            'lon' => '13.404954',
        ],
        [
            'name' => 'Berlin Friedrichshain',
            'lat' => '52.515816',
            'lon' => '13.454293',
        ],
    ];

    private $apiKey = 'your_api_key_here';

    public function index()
    {
        foreach ($this->locations as $location) {
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                'lat' => $location['lat'],
                'lon' => $location['lon'],
                'appid' => $this->apiKey,
                'units' => 'metric',
            ]);

            $data = $response->json();

            $weatherData = new WeatherData();
            $weatherData->time = Carbon::now();
            $weatherData->name = $location['name'];
            $weatherData->lat = $location['lat'];
            $weatherData->lon = $location['lon'];
            $weatherData->temp = $data['main']['temp'];
            $weatherData->pressure = $data['main']['pressure'];
            $weatherData->humidity = $data['main']['humidity'];
            $weatherData->temp_min = $data['main']['temp_min'];
            $weatherData->temp_max = $data['main']['temp_max'];
            $weatherData->save();
        }

        $weatherData = WeatherData::all();
        return view('weatherData', ['weatherData' => $weatherData]);
    }
}
