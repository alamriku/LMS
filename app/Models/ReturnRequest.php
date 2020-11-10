<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnRequest extends Model
{
    use HasFactory;
    const PENDING = "Pending";
    public function returnByUser(){
        return $this->belongsTo('App\Models\User');
    }
}
