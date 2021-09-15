<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'spt_drivers';
    protected $primaryKey = '_id';

    protected $fillable = [
        'name',
        'address',
        'gender',
        'birthdate',
        'phone',
        'photo',
        'status',
    ];
}
