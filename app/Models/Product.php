<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'name',
        'cost',
        'costKDV',
        'listCost',
        'sanliurfa',
        'hatay',
        'maras',
        'stock'
    ];
    protected $table='products';


}
