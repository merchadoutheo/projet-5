<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class userController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$users = User::latest()->paginate(25);

    	return view('Admin/home')->with([
            'users' => $users
        ]);
    }
    public function showInfo($id)
    {
        $user = User::findOrFail($id);
        $matchs = file_get_contents('http://merchadou.com/api.php?r=matchs_all');
        $matchs = json_decode($matchs);
        foreach ($user->pronostic as $pronostic) {
            foreach ($matchs->entries as $id => $match) {
                if(($id == $pronostic->id_match) && ($match->is_local)):
                    $prono[$pronostic->id] = $pronostic;
                endif;
            }
        }
        return view('Admin/infoUser')->with([
            'user' => $user,
            'pronostics' => $prono,
            'matchs' => $matchs->entries
        ]);
    }
}
