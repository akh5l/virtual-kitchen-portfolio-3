<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $query = Recipe::with('user'); // include user relationship

        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('type', 'like', '%' . $search . '%');
            });
        }

        $recipes = $query->get();

        return view('recipes.index', compact('recipes'));
    }

    public function show($rid)
    {
        $recipe = Recipe::with('user')->findOrFail($rid);

        if (!$recipe) {
            return redirect()->route('recipes.index')->with('error', 'Recipe not found!');
        }

        return view('recipes.show', compact('recipe'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'cookingtime' => 'required|integer',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->type = $request->type;
        $recipe->Cookingtime = $request->cookingtime;
        $recipe->ingredients = $request->ingredients;
        $recipe->instructions = $request->instructions;
        $recipe->uid = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $recipe->image = $imagePath;
        }

        $recipe->save();

        return redirect()->route('recipes.index')->with('success', 'Recipe added successfully!');
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        if ($recipe->uid !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to edit this recipe.');
        }
        
        return view('recipes.edit', compact('recipe'));
    }

    public function destroy(Recipe $recipe)
    {
    if (auth()->id() !== $recipe->uid) {
        abort(403, 'Unauthorized action.');
    }

    $recipe->delete();
    return redirect()->route('dashboard')->with('success', 'Recipe deleted successfully!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'cookingtime' => 'required|integer',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $recipe = Recipe::findOrFail($id);
        if ($recipe->uid !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to edit this recipe.');
        }

        $recipe->name = $validated['name'];
        $recipe->description = $validated['description'];
        $recipe->type = $validated['type'];
        $recipe->Cookingtime = $validated['cookingtime'];
        $recipe->ingredients = $validated['ingredients'];
        $recipe->instructions = $validated['instructions'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $recipe->image = $imagePath;
        }

        $recipe->save();

        return redirect()->route('dashboard')->with('success', 'Recipe updated successfully!');
    }
}
