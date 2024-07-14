<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'uni_name',
        'uni_address',
        'uni_image'
    ];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
};

