<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Pronostic;
use App\User;

class PronosticController extends Controller
{
    public function showAll($id_match)
    {
    	$pronostic = Pronostic::latest()->where('id_match', '=', $id_match)->paginate(10); 
    }
	public function showMatchs()
	{
		$matchs = file_get_contents('http://merchadou.com/api.php?r=matches');
		$matchs = json_decode($matchs);
	}

	public function nextMatch()
	{
		 $prochain_match = file_get_contents('http://merchadou.com/api.php?r=prochain_match');
        $prochain_match = json_decode($prochain_match);
        return view('nextMatch')->with([
            'prochain_match' => $prochain_match
        ]);
	} 
	public function showAllProno()
	{
		$matchs = file_get_contents('http://merchadou.com/api.php?r=matchs_all');
		$matchs = json_decode($matchs);
		return view('pronostic')->with([
			'matchs' => $matchs
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

		
		foreach ($joueurs as $joueur) {
			$score = abs(( $match->receiving_score - $joueur['pronostic']->score_stade )) + abs(( $match->received_score - $joueur['pronostic']->score_adv ));
			$joueur['score'] = $score;
			dump($joueur['score']);
		}
		foreach ($joueurs as $joueur) {
			dump($joueur);
		}
	}
}
