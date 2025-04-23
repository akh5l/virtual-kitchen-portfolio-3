<x-app-layout>

    <x-slot name="header">
        <h1 class="text-2xl font-bold text-white mb-4">Welcome to your dashboard. Add, edit or delete your recipes here.</h1>
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">

                    <!-- add recipe button -->
                    <div class="mt-6">
                        <a href="{{ route('recipes.create') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105 font-semibold">
                            Add New Recipe
                        </a>
                    </div>

                    <!-- your recipes -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-4">Your Recipes</h3>

                        @if ($recipes->isEmpty())
                            <p>You haven't posted any recipes yet.</p>
                        @else
                            @foreach ($recipes as $recipe)
                                <div class="border border-gray-700 p-4 rounded mb-4">
                                    <h4 class="text-md font-bold">{{ $recipe->name }}</h4>
                                    <p>{{ $recipe->description }}</p>
                                    <form action="{{ route('recipes.edit', $recipe->rid) }}" method="GET" class="inline-block mr-2">
                                        <button type="submit"
                                            class="bg-blue-500 text-white my-2 py-1 px-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105 font-semibold">
                                            Edit
                                        </button>
                                    </form> 
                                    <form action="{{ route('recipes.destroy', $recipe->rid) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this recipe?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white my-2 py-1 px-2 rounded-md hover:bg-red-600 transition duration-300 ease-in-out transform hover:scale-105 font-semibold">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
