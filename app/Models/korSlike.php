<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Koraci;

class korSlike extends Model
{
    use HasFactory;

    protected $table = 'kor_slikes';

    protected $fillable = ['slika','korak_id'];


    public function slika()
    {
        return $this->belongsTo(Koraci::class, 'korak_id');
    }
}
