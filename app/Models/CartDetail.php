<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = 'cart_detail';
    public $timestamps = false;
    protected $fillable = [
        'ID_cart',
        'ID_product',
        'quanlity'
    ];
}
