<x-app-layout>
    <div class="max-w-4xl mx-auto p-8 bg-gray-800 rounded-2xl shadow-lg mt-8 space-y-6">
        <h1 class="text-4xl font-extrabold text-gray-100">{{ $recipe->name }}</h1>

        @if($recipe->user)
            <p class="text-gray-100 text-lg">
                <strong class="font-bold">Created by:</strong> {{ $recipe->user->username }}
            </p>
        @endif

        <div class="text-gray-100 space-y-2">
            <p><strong>Type:</strong> {{ $recipe->type }}</p>
            <p><strong>Cooking Time:</strong> {{ $recipe->Cookingtime }} minutes</p>
        </div>

        <div>
            <h2 class="text-xl font-semibold text-gray-100 mt-4 mb-2">Description</h2>
            <p class="text-gray-200 leading-relaxed">{{ $recipe->description }}</p>
        </div>

        <div>
            <h2 class="text-xl font-semibold text-gray-100 mt-4 mb-2">Ingredients</h2>
            <ul class="list-disc list-inside text-gray-200 space-y-1">
                @foreach(explode(',', $recipe->ingredients) as $ingredient)
                    <li>{{ trim($ingredient) }}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <h2 class="text-xl font-semibold text-gray-100 mt-4 mb-2">Instructions</h2>
            <p class="text-gray-200 whitespace-pre-line leading-relaxed">{{ $recipe->instructions }}</p>
        </div>

        @if($recipe->image)
            <div class="mt-6">
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="Recipe Image" class="w-96 h-auto rounded-lg shadow-md">
            </div>
        @endif
    </div>
</x-app-layout>
