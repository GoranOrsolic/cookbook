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

class UpdateController extends Controller
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
        return view('edit');
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
    public function store(Request $request, $recepti)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Recepti $recepti, $id)

    {

        $recepti = Recepti::where('id' ,$id)->first();
        return view('edit', compact('recepti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //Update
        $recepti = Recepti::find($id);

        if ($request->hasFile('slika')) {
        $image = $request->file('slika');
       //  print_r($image);
        $slika = time().'.'.$image->getClientOriginalExtension();
       //  echo $image;
       //  exit(0);
        $destinationPath = base_path('storage/app/public');
        $image->move($destinationPath, $slika);
        }
         if (isset($slika['slika'])) {
        $recepti->ime =  $request->get('ime');
        $recepti->opis = $request->get('opis');
        $recepti->slika = $request->get('slika');
        $recepti->save();
        }

        elseif (! isset($slika['slika'])) {
            $recepti->ime =  $request->get('ime');
            $recepti->opis = $request->get('opis');
            $recepti->save();
        }


        //Update sastojka
        //$naziv = $request->input('sast', []);
        $rec = Sastojci::where('recept_id', $id)->pluck("id");
        //dd($rec);

        $sas = $request->input('sastojci');
        //dd($sas);

        if (isset($sas)) {
        foreach ($sas as $value => $k) {
            //dd($sas,$value,$k);
            Sastojci::where('id', $rec[$value])->update(['naziv' => $k]);
        }
        }

        foreach ($request->sast as $sast) {
        if (isset($sast)) {
            $detail = new Sastojci();
            $detail->naziv = $sast;
            $detail->recept_id = $id;
            $detail->save();
        }}
        //

        //Update koraka

        $kor = Koraci::where('recept_id', $id)->pluck("id");
        //dd($kor);
        $korak = $request->input('koraci');
        $imag = $request->file('kor_sli');
        //dd($korak);
        if (isset($korak)) {
        foreach ($korak as $value => $k) {
            //dd($sas,$value,$k);
            Koraci::where('id', $kor[$value])->update(['korak' => $k]);
        }}
        $destinationPath = base_path('storage/app/public');
        if (isset($imag)) {
        foreach ($imag as $valu => $s) {
             $extension = $s->getClientOriginalExtension();
                $fileName = uniqid(). '.' .$extension; 
                $s->move($destinationPath, $fileName); 
            //dd($imag,$valu,$s);
            Koraci::where('id', $kor[$valu])->update(['slika' => $fileName]);
        }}

        //

        return redirect()->route('recepti');

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $delrec = Recepti::where('id',$id)->delete();
    //dd($delrec);
    return view('add');
    }

}
