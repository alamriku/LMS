<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function authors(){
        return $this->belongsToMany('App\Models\Author')->using('App\Models\AuthorBook');
    }

    public function publication(){
        return $this->belongsTo('App\Models\Publication');
    }

    public function genres(){
        return $this->belongsToMany('App\Models\Genre')->using('App\Models\BookGenre')->withTimestamps();
    }

    public function bookOfCopies(){
        return $this->hasMany('App\Models\BookCopy');
    }


}
