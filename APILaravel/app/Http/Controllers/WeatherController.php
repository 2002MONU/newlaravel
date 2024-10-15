<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService  $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function show(Request $request)
    {
        $city = $request->input('city');
        $country = $request->input('country');

        if (!$city || !$country) {
            return redirect()->back()->with('error', 'Please provide both city and country.');
        }

        $weather = $this->weatherService->getWeather($city, $country);

        if (isset($weather['error'])) {
            return redirect()->back()->with('error', $weather['error']);
        }

        return view('weather.show', compact('weather'));
    }
}
