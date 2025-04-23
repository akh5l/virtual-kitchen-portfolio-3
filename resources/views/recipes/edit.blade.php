<x-app-layout>
    <div class="container text-gray-100 mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Recipe</h1>

        <form action="{{ route('recipes.update', $recipe->rid) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-lg font-medium">Recipe Name</label>
                <input type="text" id="name" name="name" value="{{ $recipe->name }}" class="block w-full p-2 border rounded-md bg-gray-800 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-lg font-medium">Recipe Type</label>
                <input type="text" id="type" name="type" value="{{ $recipe->type }}" class="block w-full p-2 border rounded-md bg-gray-800 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-lg font-medium">Description</label>
                <textarea id="description" name="description" class="block w-full p-2 border rounded-md bg-gray-800 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" rows="4" required>{{ $recipe->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="cookingtime" class="block text-lg font-medium">Cooking Time (minutes)</label>
                <input type="number" id="cookingtime" name="cookingtime" value="{{ $recipe->Cookingtime }}" class="block w-full p-2 border rounded-md bg-gray-800 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="ingredients" class="block text-lg font-medium">Ingredients (separate  with commas)</label>
                <textarea id="ingredients" name="ingredients" class="block w-full p-2 border rounded-md bg-gray-800 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" rows="4" required>{{ $recipe->ingredients }}</textarea>
            </div>

            <div class="mb-4">
                <label for="instructions" class="block text-lg font-medium">Instructions</label>
                <textarea id="instructions" name="instructions" class="block w-full p-2 border rounded-md bg-gray-800 shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" rows="4" required>{{ $recipe->instructions }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-lg font-medium">Upload New Image (optional)</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full text-sm text-gray-200 file:py-1 file:px-2 file:rounded-md file:border file:border-gray-300 file:text-sm file:bg-gray-200 bg-gray-800 rounded-md">
            </div>

            @if ($recipe->image)
                <div class="mb-4">
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="Current Image" class="w-96 h-auto rounded">
                </div>
            @endif

            <button type="submit" class="bg-yellow-600 text-white py-2 px-4 rounded hover:bg-yellow-700 transition duration-300 ease-in-out transform hover:scale-105 font-semibold">
                Update Recipe
            </button>
        </form>
    </div>
</x-app-layout>
