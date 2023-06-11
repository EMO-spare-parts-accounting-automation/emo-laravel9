<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalaceHistory extends Model
{
    use HasFactory;
    protected $fillable=[
        "userid",
        "orderid",
        "payment",
        "totalbalance",
        "status",

    ];
}
