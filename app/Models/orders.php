<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'coupon_id',
        'fullname',
        'email',
        'phone_number',
        'address',
        'note',
        'token',
        'order_date',
        'status',
        'total_money',
    ];
    public function orderDetail(){
        return $this->hasMany(OrderDetail::class, 'order_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class,'coupon_id','id');
    }
}
