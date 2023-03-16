<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{

    protected $table = 'type_products';
    protected $primaryKey = 'ID_type';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'ID_type',
        'name_type'
    ];

}
