<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
</head>
<body>
    <h1>Weather in {{ $weather['location']['name'] }}, {{ $weather['location']['country'] }}</h1>
    <p>Temperature: {{ $weather['current']['temperature'] }} °C</p>
    <p>Weather: {{ $weather['current']['weather_descriptions'][0] }}</p>
    <p>Humidity: {{ $weather['current']['humidity'] }}%</p>
    <p>Wind Speed: {{ $weather['current']['wind_speed'] }} km/h</p>

    <a href="{{ route('weather.form') }}">Check another city</a>
</body>
</html>
