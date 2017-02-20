@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table>
              <tr>
                <th>id</th>
                <th>Pseudo</th>
                <th>Permissions</th>
                <th>Informations</th>
              </tr>
              @foreach( $users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
          
                  @if($user->role == 0)

                    <td>Visiteur</td>

                  @elseif($user->role == 1)
                  
                    <td>Pronostiqueur</td>

                  @elseif($user->role == 2)

                    <td>Administrateur</td>

                  @else

                    <td>Role inconnu</td>

                  @endif

                  <td><a href="{{ route('user.admin', $user->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></td>

                  
                </tr>
              @endforeach
            </table>

            {{ $users->links() }}          
                
        </div>

        <a href="{{ route('index.admin.pronostic') }}" class="btn btn-primary">Voir les pronostics</a>
    </div>
</div>
@endsection
