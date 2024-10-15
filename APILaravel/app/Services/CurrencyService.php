<?php

namespace App\Services;

use GuzzleHttp\Client;

class CurrencyService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('CURRENCY_API_KEY');
    }

    public function getCurrencies()
    {
        return [
            'USD' => 'United States Dollar',
            'EUR' => 'Euro',
            'GBP' => 'British Pound Sterling',
            'INR' => 'Indian Rupee',
            'AUD' => 'Australian Dollar',
            'CAD' => 'Canadian Dollar',
            'SGD' => 'Singapore Dollar',
            'CHF' => 'Swiss Franc',
            'MYR' => 'Malaysian Ringgit',
            'JPY' => 'Japanese Yen',
            'CNY' => 'Chinese Yuan',
            'MXN' => 'Mexican Peso',
            'BRL' => 'Brazilian Real',
            'RUB' => 'Russian Ruble',
            'ZAR' => 'South African Rand',
            'KRW' => 'South Korean Won',
            'NZD' => 'New Zealand Dollar',
            'SEK' => 'Swedish Krona',
            'NOK' => 'Norwegian Krone',
            'DKK' => 'Danish Krone',
            'PLN' => 'Polish Zloty',
            'THB' => 'Thai Baht',
            'HKD' => 'Hong Kong Dollar',
            'TRY' => 'Turkish Lira',
            'ILS' => 'Israeli New Shekel',
            'PHP' => 'Philippine Peso',
            'AED' => 'United Arab Emirates Dirham',
            'HUF' => 'Hungarian Forint',
            'CZK' => 'Czech Koruna',
            'COP' => 'Colombian Peso',
            'RSD' => 'Serbian Dinar',
            'UAH' => 'Ukrainian Hryvnia',
            'CLP' => 'Chilean Peso',
            'PEN' => 'Peruvian Sol',
            'BND' => 'Brunei Dollar',
            'KWD' => 'Kuwaiti Dinar',
            'JOD' => 'Jordanian Dinar',
            'OMR' => 'Omani Rial',
            'TWD' => 'New Taiwan Dollar',
            'VND' => 'Vietnamese Dong',
            'DZD' => 'Algerian Dinar',
            'BHD' => 'Bahraini Dinar',
            'GHS' => 'Ghanaian Cedi',
            'MUR' => 'Mauritian Rupee',
            'LKR' => 'Sri Lankan Rupee',
            'TTD' => 'Trinidad and Tobago Dollar',
            'BWP' => 'Botswana Pula',
            'ETB' => 'Ethiopian Birr',
            'ISK' => 'Icelandic Króna',
            'JMD' => 'Jamaican Dollar',
            'MOP' => 'Macanese Pataca',
            'NAD' => 'Namibian Dollar',
            'PYG' => 'Paraguayan Guarani',
            'RWF' => 'Rwandan Franc',
            'SBD' => 'Solomon Islands Dollar',
            'WST' => 'Samoan Tala',
            'XAF' => 'Central African CFA Franc',
            'XCD' => 'East Caribbean Dollar',
            'XOF' => 'West African CFA Franc',
            'XPF' => 'CFP Franc',
        ];
    }

    public function convert($from, $to, $amount)
    {
        $url = "https://api.exchangerate-api.com/v4/latest/{$from}";

        $response = $this->client->get($url);
        $data = json_decode($response->getBody(), true);

        if (!isset($data['rates'][$to])) {
            return ['error' => 'Invalid currency code.'];
        }

        $rate = $data['rates'][$to];
        $convertedAmount = $rate * $amount;

        return [
            'from' => $from,
            'to' => $to,
            'rate' => $rate,
            'amount' => $amount,
            'convertedAmount' => $convertedAmount,
        ];
    }
}
