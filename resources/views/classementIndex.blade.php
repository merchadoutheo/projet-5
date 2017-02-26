@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading titre-liste-match-classement"><h3>Liste des matchs</h3></div>
                  <div class="panel-body">
                  @foreach($matchs->entries as $id => $match)
                    @if($match->is_local)
                      <div class="well">
                        <p>{{$match->match_name}}<a class="btn btn-primary pull-right" href="{{ route('match.classement', $id) }}">Voir le classement -></a></p>
                        
                      </div>
                      <hr class="red">
                    @endif
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
