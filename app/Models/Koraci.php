<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recepti;
use App\Models\User;

class Koraci extends Model
{
    use HasFactory;

    protected $table = 'koraci';

    protected $fillable = ['korak','recept_id'];


    public function korak()
    {
        return $this->belongsTo(Recepti::class, 'id');
    }
    
}
