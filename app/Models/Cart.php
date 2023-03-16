<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'ID_cart';
    public $timestamps = false;
    protected $fillable = [
        'ID_cart',
        'ID_user'
    ];
}
