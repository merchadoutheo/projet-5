@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading titre-classement"><h3>Classement du match : {{ $match->match_name }}</h3></div>

        <!-- Table -->
        <table class="table classement">
          <tr>
            <th>Position</th>
            <th>Nom</th>
            <th>Score</th>
          </tr>
          <?php $i = 1 ?>
          @foreach($classement as $score => $pronostic)
          <tr class="joueurs-classement">
            <td>{{$i}}</td>
            <td>{{$pronostic->user->name}}</td>
            <td>{{$score}}</td>
          </tr>
          <?php $i++; ?>
          @endforeach
        </table>
        <div class="panel-footer">
          <a href="{{route('classement.index')}}" class="btn btn-default">Retour à la liste des matchs <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
