<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function order_item(){
        return $this->hasMany(Order_item::class, 'order_id');
    }
}
