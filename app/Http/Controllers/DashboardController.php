<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $recipes = Recipe::where('uid', $user->uid)->get();

        return view('dashboard', compact('recipes'));
    }
}
