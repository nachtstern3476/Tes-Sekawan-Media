<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'spt_vehicles';
    protected $primaryKey = '_id';

    protected $fillable = [
        'name',
        'brand',
        'type',
        'plate_number',
        'owner',
        'status',
    ];
}
