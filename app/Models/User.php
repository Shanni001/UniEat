<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;

    protected $fillable = [
        'fullname','username', 'email', 'phone', 'password',  'password_confirmation','user_type','gender',
         'restaurant_id'

  
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);

    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}


    











