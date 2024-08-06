<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form</title>
</head>
<body>
    <h1>{{ $mailData['subject'] }}</h1>

    <p>From: {{ $mailData['name'] }}  ({{ $mailData['email'] }})</p>

    <p>{{$mailData['message']}}</p>

    <p>Thank You.</p>

</body>
</html>