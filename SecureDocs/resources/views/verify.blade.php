<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verification</title>
</head>
<body>

    <form action="{{ route('verification.verify') }}" method="POST">
        @csrf
        <input type="password" name="password" placeholder="Enter Default Password">
        <button type="submit">Verify</button>
    </form>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</body>
</html>
