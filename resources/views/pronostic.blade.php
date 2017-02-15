@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        {{-- dd($matchs->entries, Auth()->user()->pronostic) --}}
          @foreach($matchs->entries as $id => $match)
            @foreach(Auth()->user()->pronostic as $pronostic)
              @if($id == $pronostic->id_match)
                <h1>{{ $match->match_name }}</h1>
              @endif
            @endforeach
          @endforeach
          @foreach(Auth()->user()->pronostic as $pronostic)
            <h1>Score Stade : {{ $pronostic->score_stade }} VS Score Adv : {{ $pronostic->score_adv }}</h1>
          @endforeach
        </div>
    </div>
</div>
@endsection
