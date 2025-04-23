<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipe/{rid}', [RecipeController::class, 'show'])->name('recipes.show');

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/{rid}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    Route::put('/recipes/{rid}', [RecipeController::class, 'update'])->name('recipes.update');    
});

