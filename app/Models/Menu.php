<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_name',
        'slug',
        'menu_description',
        'image',
        'price',
        'restaurant_id',
        'in_stock',
        'in_active',
        'is_featured',
        
      
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
