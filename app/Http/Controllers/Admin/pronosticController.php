<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pronostic;

class pronosticController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$pronostics = Pronostic::latest()->paginate(15);
    	$matchs = file_get_contents('http://merchadou.com/api.php?r=matchs_all');
		$matchs = json_decode($matchs);

    	return view('Admin/pronostics')->with([
    		'matchs' => $matchs,
            'pronostics' => $pronostics
        ]);
    }
}
