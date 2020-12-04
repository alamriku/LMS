<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    public const USER = "User";
    public const ROLEAUTHOR = "Author";
    public const BANNED = 1;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function books()
    {
        return $this->hasMany(BookUser::class);
    }

    public function addedCopies()
    {
        return $this->hasMany(BookCopy::class, 'added_by');
    }

    public function returns()
    {
        return $this->hasMany(ReturnRequest::class);
    }

    public function loans()
    {
        return $this->hasMany(LoanRequest::class);
    }

    public function changedLoanStatus()
    {
        return $this->hasMany(LoanRequest::class, 'status_changed_by');
    }
    public function changedReturnStatus()
    {
        return $this->hasMany(ReturnRequest::class, 'status_changed_by');
    }
    public function ScopeIsUser($query, $type)
    {
        return $query->where('role', USER::USER);
    }
}
