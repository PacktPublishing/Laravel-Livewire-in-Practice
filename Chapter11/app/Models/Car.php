<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'make',
        'model',
        'user_id',
        'year',
        'features',
        'image_url',
        'available',
        'mileage',
        'transmission',
        'daily_hire_cost',
        'is_featured',
        'views',
        'is_approved'

    ];
}
