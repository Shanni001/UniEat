<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Restaurant;

class UniversityController extends Controller
{
    public function university()
    {
        $universities = University::all();
        return view('university', compact('universities'));
    }

}



