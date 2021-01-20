<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $use = auth()->id();
        //dd($use);
        $user = User::where('id', $use)->get();
        //dd($user);
        return view('profil', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $use = auth()->id();
        $user = User::where('id', $use)->first();
        //dd($user);
        if ($request->hasFile('avatar')) {
        $image = $request->file('avatar');
       //  print_r($image);
        $slika = time().'.'.$image->getClientOriginalExtension();
       //  echo $image;
       //  exit(0);
        $destinationPath = base_path('storage/app/public');
        $image->move($destinationPath, $slika);
        }

        $user->name =  $request->get('ime');
        $user->email = $request->get('email');
        $user->avatar = $slika;
        $user->password = $request->get('password');
        //dd($user);
        $user->update();


     //    if (request('avatar')) {

     //     $attributes['avatar'] = request('avatar')->store('avatars');
     //     //$attributes['banner'] = request('banner')->store('avatars');
     // }

     // elseif (isset($attributes['banner'])) {
     //    $attributes['banner'] = request('banner')->store('avatars');
     // 
        return redirect()->route('home');
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
