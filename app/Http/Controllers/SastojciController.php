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

class SastojciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        
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
    public function update(Request $request, $id)
    {  
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id,  $sastojci)
    {
           
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $rec = Sastojci::where('recept_id', $id)->pluck("id");

    //     $sas = $request->input('sastojci');
    //     //dd($sas);
    //     foreach ($sas as $value => $k) {
    //         //dd($sas,$value,$k);
    //         Sastojci::where('id', $rec[$value])->update(['naziv' => $k]);
    //     }
    //      return redirect()->route('recepti');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delsas = Sastojci::where('id', $id)->delete();
        //dd($delsas);
        return view('add');

    }
}
