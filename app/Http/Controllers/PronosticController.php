<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Pronostic;

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
}
