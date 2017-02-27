@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
				<h1>Une erreur c'est produite</h1>
				<h3>(Erreur 500)</h3>
				</div>
			<a href="{{ route('accueil') }}">Retour à la page d'accueil</a>
		</div>
	</div>
</div>
</div>
</div>
@endsection
