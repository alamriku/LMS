<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanRequest extends Model
{
    use HasFactory,SoftDeletes;
    const Pending = 'Pending';
    public function loanByUser()
    {
        return $this->belongsTo('App\Models\User');
    }
}
