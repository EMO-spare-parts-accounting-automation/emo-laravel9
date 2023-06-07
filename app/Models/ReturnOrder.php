<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'orderid',
        'productid',
        'customerfeedback',
        'adminfeedback',
        'returncost',
        'refreshproduct',
        'status',
    ];
}
