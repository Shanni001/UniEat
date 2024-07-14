<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'rest_name', 
        'rest_address',
         'image_url',
         'university_id'
       
    
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

   public function menus()
    {
        return $this->hasMany(Menu::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
