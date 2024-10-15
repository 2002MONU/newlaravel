<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
</head>
<body>
    <h1>Currency Converter</h1>

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('currency.convert') }}" method="POST">
        @csrf
        <div>
            <label for="from">From:</label>
            <select name="from" id="from" required>
                @foreach($currencies as $code => $name)
                    <option value="{{ $code }}">{{ $name }} ({{ $code }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="to">To:</label>
            <select name="to" id="to" required>
                @foreach($currencies as $code => $name)
                    <option value="{{ $code }}">{{ $name }} ({{ $code }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required>
        </div>

        <div>
            <button type="submit">Convert</button>
        </div>
    </form>
</body>
</html>
