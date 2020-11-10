<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookUser extends Model
{
    use HasFactory,SoftDeletes;
    public function copies()
    {
        return $this->belongsTo(BookCopy::class);
    }

    public function info()
    {
        return $this->belongsTo(User::class);
    }

    public function loanRequest()
    {
        return $this->belongsTo(LoanRequest::class);
    }

    public function returnRequest()
    {
        return $this->belongsTo(ReturnRequest::class);
    }
}
