@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table>
              <tr>
                <th>id</th>
                <th>Pronostiqueur</th>
                <th>Score</th>
              </tr>
              @foreach( $pronostics as $pronostic)
                @foreach( $matchs->entries as $id_match => $match)
                  @if($id_match == $pronostic->id_match)
                  <tr>
                    <td>{{ $pronostic->id }}</td>
                    <td>
                    {{ $pronostic->user->name }}
                    </td>
                    <td><?= abs(( $match->receiving_score - $pronostic->score_stade )) + abs(( $match->received_score - $pronostic->score_adv )); ?></td>
            
                
                    
                  </tr>
                  @endif
                @endforeach
              @endforeach
            </table>

            {{ $pronostics->links() }}          
                
        </div>

        <a href="{{ route('index.admin') }}" class="btn btn-primary">Retour à la listes des inscrits</a>
    </div>
</div>
@endsection
