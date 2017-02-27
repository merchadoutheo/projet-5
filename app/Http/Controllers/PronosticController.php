<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Pronostic;
use App\User;
use Auth;

class PronosticController extends Controller
{
	public function showAllProno()
	{
		$matchs = file_get_contents('http://merchadou.com/api.php?r=matchs_all');
		$matchs = json_decode($matchs);

		foreach($matchs->entries as $id => $match):
    		foreach(Auth()->user()->pronostic as $pronostic):
     			 if(($id == $pronostic->id_match) && ($match->is_local)):
     			 	$pronostics[] = [
     			 		"pronostic" => $pronostic,
     			 		"match" => $match
     			 	];
     			 	
     			 endif;
     		endforeach;
     	endforeach;

		foreach($matchs->entries as $id => $match){
          $id_next_match = $id+1;
		}

		return view('pronostic')->with([
			'pronostics' => $pronostics,
			'id_next_match' => $id_next_match
		]);	
	}
	public function classement($id_match)
	{
		$users = User::all();
		foreach($users as $user){
			foreach($user->pronostic as $pronostic) {
				if ($pronostic->id_match == $id_match) {
					$joueurs[] = [
						'pronostic' => $pronostic
					];
				}
			}
		}

		$matchs = file_get_contents('http://merchadou.com/api.php?r=matchs_all');
		$matchs = json_decode($matchs);

		foreach ($matchs->entries as $id=>$journe) {
			if ($id == $id_match) {
				$match = $journe;
			}
		}

		foreach ($joueurs as $id => $joueur) {
			$joueurs[$id]['score'] = abs(( $match->receiving_score - $joueur['pronostic']->score_stade )) + abs(( $match->received_score - $joueur['pronostic']->score_adv ));
			$classement[$joueurs[$id]['score']] = $joueur['pronostic'];
		}
		ksort($classement);

		return view('classement')->with([
			'classement' => $classement,
			'match' => $match
			]);
	}
	public function nextMatch()
	{
		$prochain_match = file_get_contents('http://merchadou.com/api.php?r=prochain_match');
        $prochain_match = json_decode($prochain_match);
        $matchs = file_get_contents('http://merchadou.com/api.php?r=matchs_all');
		$matchs = json_decode($matchs);
		foreach ($matchs->entries as $id => $match) {
			$id_next_match = $id + 1;
		}
        $user = Auth::user();
        try {
    		$prono_next_match = Pronostic::where('id_match', '=', $id_next_match)->where('user_id', '=', $user->id)->firstOrFail();
    		$prono_existant = true;
    	}catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    		$prono_existant = false;
    		$prono_next_match = "Aucun match de prévu";
		}


       
        return view('nextMatch')->with([
            'prochain_match' => $prochain_match,
            'prono_existant' => $prono_existant,
            'prono_next_match' => $prono_next_match
        ]);
	} 
	public function sendProno(Request $request){
		$matchs = file_get_contents('http://merchadou.com/api.php?r=matchs_all');
		$matchs = json_decode($matchs);
		foreach ($matchs->entries as $id => $match) {
			$id_next_match = $id + 1;
		}
		$user = Auth::user();

		$validation = \Validator::make($request->all(), [
    		'pronoEquipeLocale' => 'integer|required|min:0|max:300',
    		'pronoEquipeAdverse' => 'integer|required|min:0|max:300'
    	]);

    	if ($validation->fails())
    	{
    		return redirect()->back()->withErrors($validation)->withInput();
    	}

    	try {
    		$prono_next_match = Pronostic::where('id_match', '=', $id_next_match)->where('user_id', '=', $user->id)->firstOrFail();
    		$prono_existant = true;
    	}catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    		$prono_existant = false;
		}
    	
    	if($prono_existant):
    		$pronostic = $prono_next_match;
    	else:
    		$pronostic = new Pronostic;
    	endif;
    	$pronostic->id_match = $id_next_match;
    	$pronostic->user_id = $user->id;
    	$pronostic->score_stade = $request->pronoEquipeLocale;
    	$pronostic->score_adv = $request->pronoEquipeAdverse;
    	$pronostic->save();

    	return redirect()->back();
	}
}
