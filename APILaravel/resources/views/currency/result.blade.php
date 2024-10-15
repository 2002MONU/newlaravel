<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Conversion Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .result {
            margin: 20px;
        }
        .result p {
            font-size: 1.2em;
        }
        .button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="result">
        <h1>Conversion Result</h1>
        <p>{{ number_format($result['amount'], 2) }} {{ $result['from_name'] }} ({{ $result['from_code'] }}) = {{ number_format($result['convertedAmount'], 2) }} {{ $result['to_name'] }} ({{ $result['to_code'] }})</p>
        <p>Conversion Rate: 1 {{ $result['from_name'] }} ({{ $result['from_code'] }}) = {{ number_format($result['rate'], 2) }} {{ $result['to_name'] }} ({{ $result['to_code'] }})</p>
        <p>Equivalent of 1 {{ $result['from_name'] }} ({{ $result['from_code'] }}) = {{ number_format($result['one_unit_conversion'], 2) }} {{ $result['to_name'] }} ({{ $result['to_code'] }})</p>
        <div class="button">
            <a href="{{ route('currency.index') }}">Convert Another</a>
        </div>
    </div>
</body>
</html>
