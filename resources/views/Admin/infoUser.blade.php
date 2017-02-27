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
                      <a href="{{route('user.changeStatut',$user->id)}}" class="btn btn-primary"><span class="glyphicon">Visiteur</span></a>
                    @elseif($user->role == 1)
                      <a href="{{route('user.changeStatut',$user->id)}}" class="btn btn-success"><span class="glyphicon">Pronostiqueur</span></a>
                    @elseif($user->role == 2)
                    <button class="btn btn-danger">Administrateur</button>
                    @endif
                  </a>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading"><h3>Pronostics</h3></div>
                  <div class="panel-body">
                  @if($pronostics == null)
                  <h3>Vous n'avez pas encore proposer de pronostic</h3>
                  @else
                  @foreach($pronostics as $pronostic)
                    @foreach($matchs as $id => $match)
                      @if($id == $pronostic->id_match)
                      <div class="well">
                        <h3 class="titre-prono-info-user">{{$match->match_name}}</h3>
                        <div class="prono">
                           <h5 class="titre-prono">Pronostic</h5>
                           <h4>{{ $pronostic->score_stade }} - {{ $pronostic->score_adv }}</h4>
                        </div>
                        <div class="resultat">
                           <h5 class="titre-prono">Résultat</h5>
                           <h4>{{ $match->receiving_score }} - {{ $match->received_score  }}</h4>
                        </div>
                        <div class="score-page">
                          <h5>SCORE</h5>
                          <h2><?= abs(( $match->receiving_score - $pronostic->score_stade )) + abs(( $match->received_score - $pronostic->score_adv )) ?></h2>
                        </div>
                      </div>
                       
                      @endif
                    @endforeach
                  @endforeach
                  @endif;
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
