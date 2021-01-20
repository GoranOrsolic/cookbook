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


class ReceptiController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        
        return view('add');  
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

    public function search()
{
        $recepti = Recepti::query()->where('ime', 'Like', '%' . request('search') . '%')->get();
    
        return view('search', compact('recepti'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('slika')) {
        $image = $request->file('slika');
       //  print_r($image);
        $slika = time().'.'.$image->getClientOriginalExtension();
       //  echo $image;
       //  exit(0);
        $destinationPath = base_path('storage/app/public');
        $image->move($destinationPath, $slika);}


         $attributes = ([
            'ime' => $_POST['ime'],
            'opis' =>$_POST['opis'],
            'slika' =>$slika
            ]);

        if (isset($attributes['slika'])) {

         $recept_id = Recepti::create ([
            'user_id' => auth()->id(),
            'ime' => $attributes['ime'],
            'opis' => $attributes['opis'],
            'slika' => $attributes['slika'],
            
        ]);
        }

        elseif (! isset($attributes['slika'])) {
            $recept_id = Recepti::create ([
            'user_id' => auth()->id(),
            'ime' => $attributes['ime'],
            'opis' => $attributes['opis'],
            ]);

        } 
        //dd($attributes);
        //$ide = Recepti::where('id', $recept_id->id)->pluck('id');
        //dd($ide);
        $naziv = $_POST['sastojci'];
        //$recept_id = Recepti::get('id')->last();
        //dd($recept_id);

        for($count = 0; $count < count($naziv); $count++)
      {
       $data = array(
        'naziv' => $naziv[$count],
        'recept_id' => $recept_id['id'],
       );
       $insert_data[] = $data; 
      }

      Sastojci::insert($insert_data);

        $korak = $_POST['koraci'];

        for($count = 0; $count < count($korak); $count++)
      {
       $dat = array(
        'korak' => $korak[$count],
        'recept_id' => $recept_id['id'],
       );
       $insert_dat[] = $dat; 
      }

      Koraci::insert($insert_dat);

         return redirect()->route('add');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recepti  $recepti
     * @return \Illuminate\Http\Response
     */
    public function show(Recepti $recepti, $id)
    {
        $recepti = Recepti::where('id' ,$id)->first();
        return view('show', compact('recepti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recepti  $recepti
     * @return \Illuminate\Http\Response
     */
    public function edit(Recepti $recepti, User $user)
    {
        $use = auth()->id();
        //dd($use);
        $user = User::where('id', $use)->get();
        $broj = Recepti::where('user_id', $use)->count();
        //dd($broj);
        $recepti = Recepti::where('user_id', $use)->latest()->get();
        //dd($recepti);
        //$recepti = DB::table('recepti')->latest()->get();
        return view('recepti', compact('recepti', 'user', 'broj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recepti  $recepti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recepti $recepti)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recepti  $recepti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recepti $recepti, $id)
    {

    // $delrec = DB::table('recepti')->where('id',$id)->delete();
    // $delrec = DB::table('recepti')->latest()->get();
    // return view('recepti', ['recepti' => $delrec]);

    }
}
