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
        return $this->belongsTo(Book::class);
    }

    public function carrier()
    {
        return $this->hasMany(BookUser::class);
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class,'added_by');
    }
}
