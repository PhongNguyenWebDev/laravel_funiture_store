<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'coupon_code',
        'coupon_name',
        'coupon_time',
        'coupon_condition',
        'coupon_number',
        'expires_at'
    ];
    // protected $primaryKey = 'id';
    // protected $table = 'coupons';
}
