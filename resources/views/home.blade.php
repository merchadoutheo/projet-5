@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-header homepage">
        <h1>Bienvenue sur Stade Prono<br/><small>Les pronostics du Stade Toulousain</small></h1>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading bloc-titre-prochain-match"><h3>Dernière Actualité</h3></div>
          <div class="panel-body">
            <h3 class="bloc-titre-news">{{ $actus->title }} - {{ $actus->subtitle }}</h3>

            <img src="{{ $actus->image_url }}" alt="image-{{ $actus->title }}" class="img-news img-responsive">

            <p>{{ $actus->intro }}</p>

          </div>
          <div class="panel-footer bloc-prono-next-match">
             <a href="{{$actus->site_url}}" class="btn bloc-prono-next-match actu">Lire l'article complet<span class="glyphicon glyphicon-chevron-right"></span></a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading bloc-titre-prochain-match"><h3>Prochain match</h3></div>
          <div class="panel-body">
           <h3 class="bloc-titre-next-match">{{ $prochain_match->championship_name }}</h3>
           <div class="row">
             <div class="col-md-6">
               <h4 class="bloc-nom-equipe-prochain-match">{{ $prochain_match->receiving_name }}</h4>
             </div>
             <div class="col-md-6">
               <h4 class="bloc-nom-equipe-prochain-match">{{ $prochain_match->received_name }}</h4>
             </div>
           </div>

           <div class="row">
             <div class="col-md-6">
               <img src="{{ $prochain_match->receiving_logo_url }}" alt="logo-{{ $prochain_match->receiving_name }}" class="img-responsive logo-next-match" width="100">
             </div>
             <div class="col-md-6">
               <img src="{{ $prochain_match->received_logo_url }}" alt="logo-{{ $prochain_match->received_name }}" class="img-responsive logo-next-match" width="100">
             </div>
           </div>
           <div class="col-md-12">
            <p class="bloc-date-next-match">Rendez vous le {{ $prochain_match->match_human_date }} </p>
          </div>

        </div>
        <div class="panel-footer bloc-prono-next-match">
          <a href="{{route('prono.prochain-match')}}" class="btn bloc-prono-next-match">Proposer un pronostic pour ce match <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
