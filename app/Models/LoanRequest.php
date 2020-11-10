<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRequest extends Model
{
    use HasFactory;
    const Pending = 'Pending';
    public function loanByUser()
    {
        return $this->belongsTo('App\Models\User');
    }
}
