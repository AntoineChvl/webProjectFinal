<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<!-- Email to inform that a content has been reported by an employee -->

<body>
<h1>Alerte : Un membre du personnel CESI vous informe d'une anomalie sur un(e) {{ $data['type'] }}</h1>


<p>{{ $data['type'] }} bloqué : {{ $data['content']  }}</p>

@if($data['type'] == 'IMAGE')
<p>Aperçu visuel :</p>
<img src="{{ asset('storage/imagesUploaded/'.$data['content']) }}" alt="">
@endif

<p>Posté par {{ $data['user'] }}</p>
<p>Le/la {{ $data['type'] }} a été bloqué(e).</p>

<p>Ceci est un message automatique. Merci de ne pas répondre. Vous adresser directement à l'administration.</p>

</body>
</html>



