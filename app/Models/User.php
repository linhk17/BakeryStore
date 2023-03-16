<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'ID_user';
    public $timestamps = false;
    protected $fillable = [
        'ID_user',
        'full_name',
        'email',
        'username'
    ];
}
