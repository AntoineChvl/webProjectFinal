<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Alerte : Un membre du personnel CESI vous informe d'une anomalie sur un(e) {{ $notification['type'] }}</h1>

<p>{{ $notification['type'] }} bloqué : {{ $notification['content']  }}</p>
<p>Posté par {{ $notification['user'] }}</p>

<p>Le/la {{ $notification['type'] }} a été bloqué(e)</p>

</body>
</html>



