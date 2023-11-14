<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($events as $event )
        <h1>{{ $event->title }}</h1>
        <p>{{ $event->body }}</p>
    @endforeach
</body>
</html>