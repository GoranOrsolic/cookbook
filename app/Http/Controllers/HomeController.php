<?php

namespace App\Http\Controllers;
use App\Models\Sastojci;
use App\Models\User;
use App\Models\Recepti;
use App\Models\Koraci;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Recepti $recepti, User $user)
    {
        $recepti = Recepti::latest()->get();
        $random = Recepti::inRandomOrder()->first();
        $random1 = Recepti::inRandomOrder()->first();
        //dd($random);
        return view('home', compact('recepti', 'random', 'random1'));
    }
}
