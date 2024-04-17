<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'product_name',
        'price',
        'discount',
        'thumbnail',
        'description',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

