<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;

    public function authors()
    {
        return $this->belongsToMany(Author::class)->using(AuthorBook::class);
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class)->using(BookGenre::class)->withTimestamps();
    }

    public function bookOfCopies()
    {
        return $this->hasMany(BookCopy::class);
    }


}
