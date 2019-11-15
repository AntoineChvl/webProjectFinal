@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Conditions générales de ventes
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/politic.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div id="boxPolitique">
        <div class="elementPolitique">
            <h3>Conditions générales de ventes</h3>
            <h4>Conditions d'utilisation</h4>
            <p>Le CESI met en œuvre tous les moyens raisonnables à sa disposition pour assurer un accès de qualité au site, mais n'est tenu à aucune obligation d'y parvenir. De même, elle ne peut, en outre, être tenue responsable de tout dysfonctionnement du réseau ou des serveurs ou de tout autre événement échappant au contrôle raisonnable, qui empêcherait ou dégraderait l'accès au site.</p>
            <p>Le CESI se réserve la possibilité d'interrompre, de suspendre momentanément ou de modifier sans préavis l'accès à tout ou partie du site afin d'en assurer la maintenance, ou pour toute autre raison, sans que l'interruption n'ouvre droit à aucune obligation ni indemnisation.</p>
            <p>Tout accès et/ou utilisation du site suppose l'acceptation et le respect de l'ensemble des termes des présentes conditions. Le CESI se réserve le droit de refuser l'accès au site, unilatéralement et sans notification préalable, à tout internaute ne respectant pas les présentes conditions d'utilisation. Dans le cas où l'utilisateur ne souhaite pas accepter tout ou partie des présentes conditions générales, il lui est demandé de renoncer à tout usage du site.</p>
            <h4>Mise en ligne et règles d'affichages</h4>
            <p>L'utilisateur est seul responsable du contenu qu'il met en ligne via le site. Il s'engage notamment à ce que ces données ne soient pas de nature à porter atteinte aux intérêts légitimes de tiers quels qu'ils soient. </p>
            <h4>Modalités de paiement</h4>
            <p>Le paiement de l'utilisateur sera effectué, en une seule fois, lors de la remise du ou des produits de la commande. La remise de la commande s'effectuera par rendez-vous avec un membre du BDE.</p>
            <h4>Droit de rétraction</h4>
            <p>L'utilisateur dispose d’un droit de rétractation de 14 jours à compter du lendemain du jour de la commande. Pour ce faire, l'utilisateur doit envoyer un mail à l’adresse adress.bde@viacesi.fr. A réception de la demande, la commande en ligne sera annulée sur le site.</p>
            <h4>Restrictions</h4>
            <p>Le CESI se réserve le droit de refuser toute commande portant sur une insertion contraire aux bonnes mœurs ou à la loi française.</p>
            <p>A ce titre, il garantit au CESI contre tous recours, fondés directement ou indirectement sur ces données, susceptibles d'être intentés par quiconque à l'encontre de la société. Il s'engage en particulier à prendre en charge le paiement des sommes, quelles qu'elles soient, résultant du recours d'un tiers à l'encontre des utilisateurs, y compris les honoraires d'avocat et frais de justice. </p>
        </div>
    </div>
@endsection
