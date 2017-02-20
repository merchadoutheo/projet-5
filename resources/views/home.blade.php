@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8">
                <div class="panel panel-default">
                  <div class="panel-heading">Dernière Actualité</div>
                  <div class="panel-body">
                  <h3 class="bloc-titre-news">{{ $actus->title }} - {{ $actus->subtitle }}</h3>

                  <img src="{{ $actus->image_url }}" alt="image-{{ $actus->title }}" class="img-news img-responsive">
                    
                    <p>{{ $actus->intro }}</p>
                    
                  </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">Prochain match</div>
                  <div class="panel-body">
                   <h3 class="bloc-titre-next-match">{{ $prochain_match->championship_name }}</h3>
                   <small>{{ $prochain_match->day_name }}</small>
                   <div class="col-md-6">
                    
                   <h4>{{ $prochain_match->receiving_name }}</h4>
                   <img src="{{ $prochain_match->receiving_logo_url }}" alt="logo-{{ $prochain_match->receiving_name }}" class="img-responsive">

                   </div>
                   <div class="col-md-6">

                   <h4>{{ $prochain_match->received_name }}</h4>
                   <img src="{{ $prochain_match->received_logo_url }}" alt="logo-{{ $prochain_match->received_name }}" class="img-responsive">

                    </div>
                      

                    <p>Rendez vous le {{ $prochain_match->match_human_date }} </p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
