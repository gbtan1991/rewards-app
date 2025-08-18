<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'admin_type',
        'account_status',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthIdentifierName(): string
    {  
        return 'username';
    }
}
