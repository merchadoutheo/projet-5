<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actus = file_get_contents('http://merchadou.com/api.php?r=actualite');

        $actus = json_decode($actus);
        $actus = $actus->entries;
        foreach ($actus as $actu) {
            $actualite[] = $actu;
        }

        $prochain_match = file_get_contents('http://merchadou.com/api.php?r=prochain_match');
        $prochain_match = json_decode($prochain_match);
        return view('home')->with([
            'prochain_match' => $prochain_match,
            'actus' => $actualite[0]
        ]);
    }
    public function classement()
    {
        $matchs = file_get_contents('http://merchadou.com/api.php?r=matchs_all');
        $matchs = json_decode($matchs);

        return view('classementIndex')->with([
            'matchs' => $matchs
            ]);
    }
}
