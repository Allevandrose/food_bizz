<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class DashboardController extends Controller
{
    public function index()
    {
        $foods = Food::all(); // Fetch all foods
        return view('dashboard', compact('foods'));
    }
}
