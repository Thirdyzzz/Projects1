<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h1>Verify Your Email Address</h1>
    <p>Thanks for signing up! To get started, please click the button below to verify your email address.</p>

    <a href="{{ $verificationUrl }}">Verify Email Address</a>

    <p>If you didn't create an account, no further action is required.</p>

    <p>Thanks,<br>{{ config('app.name') }}</p>
</body>
</html>