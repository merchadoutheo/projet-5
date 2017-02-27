@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <p class="info-pronostic"><span class="glyphicon glyphicon-info-sign"></span>Si vous avez postez un pronostic pour un match futur, vous pouvez retrouvez ou modifier ce dernier <a href="{{route('prono.prochain-match')}}">ici</a></p>
      </div>
    </div>
  </div>
  @foreach($pronostics as $pronostic)
    <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading titre-rencontre">
                <h3>{{ $pronostic['match']->match_name}}</h3>
              </div>
              <div class="panel-body">
                <div class="prono">
                   <h3 class="titre-prono">Pronostic</h3>
                   <h2>{{ $pronostic['pronostic']->score_stade }} - {{ $pronostic['pronostic']->score_adv }}</h2>
                </div>
                <div class="resultat">
                   <h3 class="titre-prono">Résultat</h3>
                   <h2>{{ $pronostic['match']->receiving_score }} - {{ $pronostic['match']->received_score  }}</h2>
                </div>
                <div class="score-page">
                  <h3>SCORE</h3>
                  <h2><?= abs(( $pronostic['match']->receiving_score - $pronostic['pronostic']->score_stade )) + abs(( $pronostic['match']->received_score - $pronostic['pronostic']->score_adv )) ?></h2>
                </div>
              </div>
              <div class="panel-footer">
                <a class="btn btn-default voir-classement-page-prono" href="{{route('match.classement', $pronostic['pronostic']->id_match)}}">Voir votre classement</a>
              </div>
            </div>
          </div>
        </div>
  @endforeach
</div>
@endsection
