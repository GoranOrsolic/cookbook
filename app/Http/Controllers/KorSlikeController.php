<?php

namespace App\Http\Controllers;

use App\Models\korSlike;
use Illuminate\Http\Request;

class KorSlikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\korSlike  $korSlike
     * @return \Illuminate\Http\Response
     */
    public function show(korSlike $korSlike)
    {
        $ide = korSlike::all()->last()->id;
        $korSlike = korSlike::where('id' ,$id)->first();
        //dd($korSlike);
        return view('show', compact('korSlike'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\korSlike  $korSlike
     * @return \Illuminate\Http\Response
     */
    public function edit(korSlike $korSlike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\korSlike  $korSlike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, korSlike $korSlike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\korSlike  $korSlike
     * @return \Illuminate\Http\Response
     */
    public function destroy(korSlike $korSlike)
    {
        //
    }
}
