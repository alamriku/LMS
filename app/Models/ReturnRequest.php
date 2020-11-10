<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReturnRequest extends Model
{
    use HasFactory,SoftDeletes;
    const PENDING = "Pending";
    public function returnByUser()
    {
        return $this->belongsTo(User::class);
    }
}
