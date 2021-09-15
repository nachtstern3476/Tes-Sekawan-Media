<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'spt_orders';
    protected $primaryKey = '_id';

    protected $fillable = [
        'driver_id',
        'vehicle_id',
        'user_input_id',
        'user_approval_id',
        'message'
    ];
}
