<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $fillable = [
        'make',
        'model',
        'year',
        'price',
        'mileage',
        'description',
        'status',
        'sold_at',
        'photo_header',
        'is_poa'];
}
