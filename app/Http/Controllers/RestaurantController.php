<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function show($university_id)
    {
        $university = University::findOrFail($university_id);
        $restaurants = $university->restaurants;
        return view('restaurant', compact('university', 'restaurants'));
    }
}
