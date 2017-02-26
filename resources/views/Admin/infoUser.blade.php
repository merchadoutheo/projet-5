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
                  <div class="panel-heading">Pronostics</div>
                  <div class="panel-body">
                  @if($pronostics == null)
                  <h3>Vous n'avez pas encore proposer de pronostic</h3>
                  @else
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
                  @endif;
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
