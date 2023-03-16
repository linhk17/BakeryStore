<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $primaryKey = 'ID_bill';
    public $timestamps = false;
    protected $fillable = [
        'ID_bill',
        'full_name',
        'number_phone',
        'address',
        'ID_user',
        'date_time',
        'total',
        'status_bill',
        'status_pay'
    ];
}
