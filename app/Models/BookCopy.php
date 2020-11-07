<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    use HasFactory;

    public function book(){
        return $this->belongsTo('App\Models\Book');
    }

    public function bookUsers(){
        return $this->hasMany('App\Models\BookUser');
    }
}
