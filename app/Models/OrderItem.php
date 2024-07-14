<?php
// app/Models/OrderItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'menu_id',
        'restaurant_id',
        'quantity',
        'price',
       
        
  

   
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // Define the relationship with the Menu model


    // Define the relationship with the Order model
   
}