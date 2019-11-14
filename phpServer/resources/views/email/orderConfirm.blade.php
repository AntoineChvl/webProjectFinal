<!doctype html>

<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Validation de commande</title>
        <link rel="stylesheet" href="{{ asset('css/project-css/email.css') }}">
    </head>

    <body>
        <div>
            <h1>Bureau de élèves - CESI</h1>
        </div>

        <div>
            <p>Total du panier : {{ $order->price }}€</p>
            <p>Référence de la commande : #{{ $order->id }}</p>
        </div>

        <p>Merci d'avoir choisi la boutique du CESI</p>
        <img src="{{ asset('assets/imgs/cesi_logo.png') }}" alt="CESI Logo">

        <hr>

        <div>
            <p>Ceci est un mail automatique, merci de ne pas y répondre.</p>
            <p>Pour nous contacter, veuillez cliquer sur le bouton "Contact" en haut du site</p>
        </div>

        <a href="LA FICHE CONTACT DE JACQUES">Contact</a>

        <div>
            <p>Chrère cliente, cher client,</p>
            <p>Vous avez passé commande sur notre site et nous vous en remercions.</p>
            <p>IMPORTANT - Suite à ce mail, vous avez été directement mis en relation avec un membre de l'équipe.
                Il/Elle vous contactera dans les plus bref délai quanc à la bonne procédure de la commande.</p>
            <p>A la date de réception de votre colis, vous bénéficiez d'un délai de 14 jours pour nous signaler votre intention de vous rétracter,
                puis vous avez un nouveau délai de 14 jours pour nous retourner le(s) produit(s) concerné(s).</p>
            <p>Merci de votre compréhension,</p>
            <p>L'équipe du BDE</p>
        </div>
    </body>

</html>
