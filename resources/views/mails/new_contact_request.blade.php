<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Hai una nuova richiesta da {{ $current_lead->name }}</h1>
    <h3>Email: {{ $current_lead->email }}</h3>
    <p>{{ $current_lead->request }}</p>

</body>
</html>