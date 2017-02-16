@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        {{-- {{ dd($matchs->entries) }} --}}
          @foreach($matchs->entries as $id => $match)
            @foreach(Auth()->user()->pronostic as $pronostic)
              @if(($id == $pronostic->id_match) && ($match->is_local))
                <h1>{{ $match->match_name }}</h1>
                <h3>Stade {{ $match->receiving_score }} - {{ $match->received_score  }}</h3>
                <h3>Pronostic de ce match :  {{ $pronostic->score_stade }} - {{ $pronostic->score_adv }}</h3>
                <h2>Votre score : <?= abs(( $match->receiving_score - $pronostic->score_stade )) + abs(( $match->received_score - $pronostic->score_adv )) ?></h2>
              @endif
            @endforeach
          @endforeach
        </div>
    </div>
</div>
@endsection
