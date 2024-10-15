<?php

namespace App\Services;

use GuzzleHttp\Client;

class WeatherService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('WEATHERSTACK_API_KEY'); // Add your Weatherstack API key to the .env file
    }

    public function getWeather($city, $country)
    {
        $url = "http://api.weatherstack.com/current?access_key={$this->apiKey}&query={$city},{$country}";

        $response = $this->client->get($url);
        $data = json_decode($response->getBody(), true);

        if (isset($data['error'])) {
            return ['error' => $data['error']['info']];
        }

        return $data;
    }
}
