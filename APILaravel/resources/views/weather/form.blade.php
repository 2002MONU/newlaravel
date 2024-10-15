<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Weather</title>
</head>
<body>
    <h1>Check Weather</h1>

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('weather.show') }}" method="GET">
        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
        </div>
        <div>
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" required>
        </div>
        <div>
            <button type="submit">Check Weather</button>
        </div>
    </form>
</body>
</html>