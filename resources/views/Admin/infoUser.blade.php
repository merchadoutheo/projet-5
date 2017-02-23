@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">Profil de {{ $user->name }}</div>
                  <div class="panel-body">
                  <p>Inscrit depuis : {{ $user->created_at }}</p>
                  <p>Rôle : </p>
                  <a href="">
                    @if($user->role == 0)
                      <button class="btn btn-ok"><span class="glyphicon">Visiteur</span></button>
                    @else
                      <button class="btn btn-ok"><span class="glyphicon">Pronostiqueur</span></button>
                    @endif
                  </a>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">Pronostics</div>
                  <div class="panel-body">
                  @foreach($pronostics as $pronostic)
                    @foreach($matchs as $id => $match)
                      @if($id == $pronostic->id_match)
                        <h3>{{$match->match_name}}</h3>
                        <p>Score final : {{$match->score}}</p>
                        <p>Pronostic : {{ $pronostic->score_stade }} - {{ $pronostic->score_adv }}</p>
                        <p> Votre score : <?= abs(( $match->receiving_score - $pronostic->score_stade )) + abs(( $match->received_score - $pronostic->score_adv )) ?> </p>
                      @endif
                    @endforeach
                  @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
