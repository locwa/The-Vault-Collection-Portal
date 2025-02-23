<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //
    protected $table = 'sales';
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'address',
        'inventory_id',
        'agreed_price',
        'user_id',
        'payment_type',
    ];
}
