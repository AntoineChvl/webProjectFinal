@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - A propos
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/politic.css') }}" rel="stylesheet">
@endpush

@section('content')
        <div id="boxPolitique">
            <!-- Display informations about the CESI -->
            <div class="elementPolitique">
                <h3>A propos de notre école</h3>
                <h4>Campus d’enseignement supérieur et de formation professionnelle, CESI poursuit sa mission sociétale en permettant à des étudiants, alternants et salariés de devenir acteurs des transformations des entreprises et de la société, grâce à ses Écoles d’Ingénieurs, son École Supérieure de l’Alternance, son École de Formation des Managers et son activité de Certification.</h4>
                <p>En 2017, ce sont plus de 22 000 apprenants qui ont rejoint les 25 campus présents sur l’ensemble du territoire français. Implanté également en Espagne, en Algérie et au Cameroun, CESI développe plus largement des grands projets d’éducation pour le compte d’institutions internationales.</p>
                <p>CESI c’est la culture de l’excellence, de la promotion sociale et de la diversité.</p>
                <p>Pionnier en France dans les méthodes de pédagogie active et tourné vers l’innovation et les technologies, CESI opère dans tous les secteurs d’activités et forme aux métiers et compétences de demain dans l’industrie et les services, le bâtiment et la ville du futur. Il mène, par ailleurs, des activités de recherche dans son Laboratoire d’Innovation Numérique (LINEACT).</p>
                <p>Membre d’HESAM Université, cofondateur de l’Institut de le Réindustrialisation et de l’Institut InnovENT-E, CESI participe au débat public en publiant chaque année l’Observatoire Social de l’Entreprise.</p>
                <p>« Être CESI » c’est devenir acteur de son parcours personnalisé et diplômant, avoir l’assurance d’évoluer tout au long de sa carrière, au rythme des transformations des entreprises et de la société. C’est, enfin, bénéficier d’une culture de l’opérationnalité reconnue par les entreprises pour une employabilité forte et durable.</p>
                <p>Le CESI forme aux principales fonctions de l'entreprise au travers de parcours diplômants et personnalisés. Il propose 25 cursus diplômants, enregistrés au Répertoire national des certifications  professionnelles (RNCP) et individualisés selon les compétences de chacun.</p>
                <p>Il développe un système pédagogique connecté aux besoins opérationnels des entreprises qui se traduit par des formations expérientielles, digitales, en mode projet avec des travaux à expérimenter en situation de travail au sein de l'entreprise et par une approche axée sur les compétences.</p>
                <p>Les enseignements sont assurés par des intervenants CESI et des professionnels reconnus comme tels dans leur domaine d'expertise RH</p>
            </div>
        </div>
@endsection
