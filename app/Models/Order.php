<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'user_id',
        'restaurant_id',
         'menu_id',
        'payment_method',
        'name',
        'phone',
        'status',
        'order_type',
        
        'collection_time',
        'comments'
        


      
      
    ];
    protected $casts = [
        'collection_time' => 'datetime',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
