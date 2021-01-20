<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recepti;
use App\Models\Sastojci;
use App\Models\Koraci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class KoraciController extends Controller
{
   public function update(Request $request, $id)
    {
        $kor = Koraci::where('recept_id', $id)->pluck("id");
        dd($kor);
        $sas = $request->input('sastojci');
        //dd($sas);
        foreach ($sas as $value => $k) {
            //dd($sas,$value,$k);
            Sastojci::where('id', $rec[$value])->update(['naziv' => $k]);
        }
         return redirect()->route('recepti');
    }
}    
