<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookCopy extends Model
{
    use HasFactory,SoftDeletes;

    const NEW_CONDITION='New';
    const OLD_CONDITION='Old';
    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

    public function bookUsers()
    {
        return $this->hasMany('App\Models\BookUser');
    }

    public function CopyAddedBy()
    {
        return $this->belongsTo('App\Models\User','added_by');
    }
}
