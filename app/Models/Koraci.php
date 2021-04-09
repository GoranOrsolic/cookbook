<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recepti;
use App\Models\User;
use App\Models\korSlike;

class Koraci extends Model
{
    use HasFactory;

    protected $table = 'koraci';

    protected $fillable = ['korak','recept_id','slika'];


    public function korak()
    {
        return $this->belongsTo(Recepti::class, 'id');
    }

    public function slika()
    {
        return $this->hasMany(korSlike::class, 'korak_id');
    }
    
}
