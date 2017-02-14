@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Prochain match</div>
        <div class="panel-body">
         <h3 class="bloc-titre-next-match">{{ $prochain_match->championship_name }}</h3>
         <small>{{ $prochain_match->day_name }}</small>
         <div class="col-md-6">

           <h4>{{ $prochain_match->receiving_name }}</h4>
           <img src="{{ $prochain_match->receiving_logo_url }}" width="100" alt="logo-{{ $prochain_match->receiving_name }}" class="img-responsive">

         </div>
         <div class="col-md-6">

           <h4>{{ $prochain_match->received_name }}</h4>
           <img src="{{ $prochain_match->received_logo_url }}" width="100" alt="logo-{{ $prochain_match->received_name }}" class="img-responsive">

         </div>


         <p>Rendez vous le {{ $prochain_match->match_human_date }} </p>
       </div>
     </div>
     <div class="panel panel-default">
        <div class="panel-heading">Proposer un pronostic</div>
        <div class="panel-body">
         <h3 class="bloc-titre-next-match">{{ $prochain_match->championship_name }}</h3>
         <small>{{ $prochain_match->day_name }}</small>
         <div class="col-md-6">

         <form action="" method="post">
           {{ csrf_field() }}

         
          
           <h4>{{ $prochain_match->receiving_name }}</h4>
           <img src="{{ $prochain_match->receiving_logo_url }}" width="100" alt="logo-{{ $prochain_match->receiving_name }}" class="img-responsive">
            <input required type="number" name="prono-equipe-locale">
         </div>
         <div class="col-md-6">

           <h4>{{ $prochain_match->received_name }}</h4>
           <img src="{{ $prochain_match->received_logo_url }}" width="100" alt="logo-{{ $prochain_match->received_name }}" class="img-responsive">
           <input required type="number" name="prono-equipe-advers">

         </div>
         <button class="btn btn-ok">Proposer le pronostic</button>
        </form>
         

         <p>Rendez vous le {{ $prochain_match->match_human_date }} </p>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection
