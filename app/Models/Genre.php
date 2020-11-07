<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function GenreBooks(){
        return $this->belongsToMany('App\Models\Book')->using('App\Models\BookGenre')->withTimestamps();
    }
}
