<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    public function publicationBooks()
    {
        return $this->hasMany('App\Models\Book');
    }
}
