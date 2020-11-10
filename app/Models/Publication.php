<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use HasFactory,SoftDeletes;

    public function publicationBooks()
    {
        return $this->hasMany('App\Models\Book');
    }
}
