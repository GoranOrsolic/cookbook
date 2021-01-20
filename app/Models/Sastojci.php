<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recepti;
use App\Models\User;


class Sastojci extends Model
{
    use HasFactory;

    protected $table = 'sastojci';

    protected $fillable = ['naziv','recept_id'];


    public function sast()
    {
        return $this->belongsTo(Recepti::class, 'id');
    }


}
