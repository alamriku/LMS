<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory,SoftDeletes;
    public function GenreBooks()
    {
        return $this->belongsToMany('App\Models\Book')->using('App\Models\BookGenre')->withTimestamps();
    }
}
