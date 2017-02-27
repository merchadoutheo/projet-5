@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      @if($prono_existant)
      <div class="panel panel-default">
        <div class="panel-heading">
          Pronostic actuel
        </div>
        <div class="panel-body">
          <p>Il semblerait que vous ayez déjà fait un pronostic pour ce match. Si vous refaites une proposition, le pronostic actuel sera remplacé.</p>

          <p>Rappel de votre pronostic : </p>
          <p>Stade Toulousain : {{ $prono_next_match->score_stade }}</p>
          <p>{{$prochain_match->received_name}} : {{ $prono_next_match->score_adv }}</p>
          <p>Date de dernière modification : {{$prono_next_match->updated_at}}</p>
        </div>
      </div>
      @endif
      <div class="panel panel-default">
        <div class="panel-heading">Proposer un pronostic</div>
        <div class="panel-body">
         <h3 class="bloc-titre-next-match">{{ $prochain_match->championship_name }}</h3>
         <p class="journee-page-match">{{ $prochain_match->day_name }}</p>

         <form action="{{ route('pronostic.send') }}" method="POST" name="sendProno" onsubmit="return validateForm()">
          {{ csrf_field() }}
          <div class="row">
             <div class="col-md-6 nom-equipe-page-prochain-match">
             <h2>{{ $prochain_match->receiving_name }}</h2>
           </div>
           <div class="col-md-6 nom-equipe-page-prochain-match">
              <h2>{{ $prochain_match->received_name }}</h2>
           </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <img class="logo-equipe-prochain-match" src="{{ $prochain_match->receiving_logo_url }}" width="100" alt="logo-{{ $prochain_match->receiving_name }}" class="img-responsive">
            </div>
            <div class="col-md-6">
              <img class="logo-equipe-prochain-match" src="{{ $prochain_match->received_logo_url }}" width="100" alt="logo-{{ $prochain_match->received_name }}" class="img-responsive">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="champ-score form-group{{ $errors->has('pronoEquipeLocale') ? ' has-error' : '' }}">
               <input required type="number" name="pronoEquipeLocale" value="{{ old('pronoEquipeLocale') }}">
               @if($errors->has('pronoEquipeLocale'))
               <span class="help-block">{{ $errors->first('pronoEquipeLocale') }}</span>
               @endif
             </div>
            </div>
            <div class="col-md-6">
              <div class="champ-score form-group{{ $errors->has('pronoEquipeAdverse') ? ' has-error' : '' }}">
               <input required type="number" name="pronoEquipeAdverse" value="{{ old('pronoEquipeAdverse') }}">
               @if($errors->has('pronoEquipeAdverse'))
               <span class="help-block">{{ $errors->first('pronoEquipeAdverse') }}</span>
               @endif
             </div>
            </div>
          </div>
         <h3 class="date-page-prochain-match">Match prévu le {{ $prochain_match->match_human_date }} </h3>
         <input type="submit" class="btn btn-ok send-prono-bouton" value="Proposer le pronostic">   
        </form>
       </div>
     </div>
   </div>
 </div>
</div>
<script type="text/javascript">
  function validateForm() {
    var x = document.forms["sendProno"]["pronoEquipeLocale"].value;
    var y = document.forms["sendProno"]["pronoEquipeAdverse"].value;
    if(x < 0){
      alert("Le score ne peux pas etre négatif");
      return false;
    }
    else if(y < 0){
      alert("Le score ne peux pas etre négatif");
      return false;
    }
    else if(x == ""){
      alert("Merci de renseignez un score pour le stade toulousain");
      return false;
    }
    else if(y == ""){
      alert("Merci de renseignez un score pour le l'quipe adverse");
      return false;
    }
    else if(x == 1){
      alert("Merci de renseignez un score valide");
      return false;
    }
    else if(x == 2){
      alert("Merci de renseignez un score valide");
      return false;
    }
    else if(x == 4){
      alert("Merci de renseignez un score valide");
      return false;
    }
    else if(y == 1){
      alert("Merci de renseignez un score valide");
      return false;
    }
    else if(y == 2){
      alert("Merci de renseignez un score valide");
      return false;
    }
    else if(y == 4){
      alert("Merci de renseignez un score valide");
      return false;
    }
    else{
      return true;
    }
  }
  </script>
  @endsection
