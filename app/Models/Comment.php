<?php

namespace App\Models;
use App\Models\Recepti;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

     protected $guarded = [];

    public function co()
    {
        return $this->belongsTo(Recepti::class,
            'comments',
            'user_id',
            'recept_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function tweets()
    {
        return $this->belongsTo(Recepti::class, 'recept_id');
    }
}
