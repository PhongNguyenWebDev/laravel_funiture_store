<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'size',
        'material',
        'color',
        'chair_legs',        
    ];
}
