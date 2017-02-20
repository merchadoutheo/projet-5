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

        return view('Admin/infoUser')->with([
            'user' => $user
        ]);
    }
}
