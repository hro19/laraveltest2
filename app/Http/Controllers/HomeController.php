<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $user_first_folder = $user->folders()->first();

        if(is_null($user_first_folder)){
            return view('home');
        }

        return redirect()->route('tasks.index',[
            'id'=> $user_first_folder->id,
        ]);
    }
}
