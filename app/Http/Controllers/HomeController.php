<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;
use SIS\User;
use SIS\Candidato;

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
        $users = User::all()->count();
        $candidatos = Candidato::where('estado','A')->get()->count();
        return view('home', compact('users','candidatos'));
    }
}
