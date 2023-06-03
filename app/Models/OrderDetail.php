<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['userId',
        'orderID',
        'productId',
        'count',
        'cost',
        'totalCost',

    ];
    protected $table='order_details';

}
