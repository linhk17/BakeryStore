<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_detail';
    public $timestamps = false;
    protected $fillable = [
        'ID_bill',
        'quanlity',
        'ID_product',
        'note'
    ];
}
