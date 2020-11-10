<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanRequest extends Model
{
    use HasFactory,SoftDeletes;
    const Pending = 'Pending';
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function statusChangedBy()
    {
        return $this->belongsTo(User::class,'status_changed_by');
    }

    public function forBook(){
        return $this->hasMany(BookUser::class);
    }
}
