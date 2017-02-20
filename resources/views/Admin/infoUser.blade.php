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
            </div>
        </div>
    </div>
</div>
@endsection
