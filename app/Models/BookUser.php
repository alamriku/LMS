<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    use HasFactory;

    public function userHaveCopy(){
        return $this->belongsTo('App\Models\BookCopy');
    }

    public function bookOfUser(){
        return $this->belongsTo('App\Models\User');
    }
}
