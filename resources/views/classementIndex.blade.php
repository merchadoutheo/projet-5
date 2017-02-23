@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">Liste des matchs</div>
                  <div class="panel-body">
                  @foreach($matchs->entries as $id => $match)
                    @if($match->is_local)
                      <div class="well">
                        <p>{{$match->match_name}}</p>
                        <a href="{{ route('match.classement', $id) }}">Voir le classement -></a>
                      </div>
                    @endif
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
