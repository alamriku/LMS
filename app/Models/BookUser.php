<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookUser extends Model
{
    use HasFactory,SoftDeletes;
    public function userHaveCopy()
    {
        return $this->belongsTo(BookCopy::class);
    }

    public function bookOfUser()
    {
        return $this->belongsTo(User::class);
    }
}
