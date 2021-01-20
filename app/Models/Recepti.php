<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Sastojci;
use App\Models\Koraci;



class Recepti extends Model
{
    use HasFactory;

    	protected $table = 'recepti';

    	protected $fillable = ['user_id', 'ime', 'opis', 'slika'];

        protected $primaryKey = 'id';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sast()
    {
        return $this->hasMany(Sastojci::class, 'recept_id');
    }

    public function korak()
    {
        return $this->hasMany(Koraci::class, 'recept_id');
    }

    public function comments() 
    { 
        return $this->hasMany(Comment::class, 'recept_id')->latest(); 

    }
}
