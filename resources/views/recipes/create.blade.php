<x-app-layout>
    <div class="container mx-auto p-4 text-gray-200">
        <h1 class="text-2xl font-bold mb-4">Add a New Recipe</h1>

        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-lg font-medium">Recipe Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full px-3 bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-lg font-medium">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full px-3 py-2 bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-lg font-medium">Recipe Type</label>
                <input type="text" name="type" id="type" class="mt-1 block w-full px-3 py-2 border bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="cookingtime" class="block text-lg font-medium">Cooking Time (minutes)</label>
                <input type="number" name="cookingtime" id="cookingtime" class="mt-1 block w-full px-3 py-2 border bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="ingredients" class="block text-lg font-medium">Ingredients</label>
                <textarea name="ingredients" id="ingredients" class="mt-1 block w-full px-3 py-2 border bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <label for="instructions" class="block text-lg font-medium">Instructions</label>
                <textarea name="instructions" id="instructions" class="mt-1 block w-full px-3 py-2 border bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-lg font-medium">Recipe Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-200 file:py-1 file:px-2 file:rounded-md file:border file:border-gray-300 file:text-sm file:bg-gray-200 bg-gray-800 rounded-md" accept="image/*">
            </div>

            <div class="mb-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Add Recipe
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
