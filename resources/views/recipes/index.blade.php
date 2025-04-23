<x-app-layout>
    <div class="container mx-auto p-6">
        <!-- search form -->
        <form action="{{ route('recipes.index') }}" method="GET" class="mb-6 flex justify-center items-center space-x-2">
            <input type="text" name="search" placeholder="Search by name or type" value="{{ request('search') }}" class="p-2 border rounded-md w-full sm:w-1/3">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105 font-semibold">Search</button>
        </form>

        <div class="mb-6 text-center">
            @guest
            <div class="flex justify-center space-x-4 mb-6">
                <a href="{{ route('login') }}" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-300 ease-in-out transform hover:scale-105 font-semibold">
                    Login
                </a>
                <a href="{{ route('register') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105 font-semibold">
                    Register
                </a>
            </div>
            @endguest


            @auth
                <div class="flex justify-center space-x-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition duration-300 ease-in-out transform hover:scale-105 font-semibold">
                            Logout
                        </button>
                    </form>
                    <form method="GET" action="{{ route('dashboard') }}">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105 font-semibold">
                            Dashboard
                        </button>
                    </form>
                </div>
            @endauth
        </div>


        <!-- heading -->
        <h1 class="text-3xl font-bold text-gray-100 mb-6">All Recipes</h1>

        <!-- list -->
        @foreach ($recipes as $recipe)
            <div class="bg-gray-800 rounded-lg shadow-lg p-4 mb-6">
                <h2 class="text-2xl font-semibold text-gray-100 mb-2">{{ $recipe->name }}</h2>
                <p class="text-gray-50 mb-2"><strong>Type:</strong> {{ $recipe->type }}</p>
                <p class="text-gray-50 mb-4">{{ $recipe->description }}</p>
                <a href="{{ route('recipes.show', $recipe->rid) }}" 
                  class="inline-block text-white bg-blue-600 hover:bg-blue-700 py-2 px-4 rounded-md text-center font-semibold transition duration-300 ease-in-out transform hover:scale-105">
                    View Details
                </a>
            </div>
        @endforeach
    </div>
</x-app-layout>
