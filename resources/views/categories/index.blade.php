@extends('layout.app')
@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10">

        {{-- En-tête --}}
        <div class="flex items-center justify-between mb-8">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Catégories
                </h1>

                <p class="text-gray-500 mt-1">
                    Gérez les catégories de votre boutique.
                </p>
            </div>

            <a href="{{ route('categories.create') }}"
                class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700 transition">
                + Ajouter
            </a>

        </div>


        {{-- Liste des catégories --}}
        @if (session('success'))
            <div class=" bg-green-100 border-green-300 text-green-700 rounded-lg p-3 mb-5 border">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white rounded-xl shadow">



            @foreach ($categories as $category)

                <div class="flex items-center justify-between p-5 border-b">

                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            {{ $category->nom }}
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            {{ $category->description }}
                        </p>
                    </div>

                    <div class="flex gap-2">

                        <a href="{{ route('categories.edit', $category) }}"
                            class="px-4 py-2 text-sm bg-gray-100 rounded-lg hover:bg-gray-200">
                            Modifier
                        </a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 text-sm bg-red-100 text-red-600 rounded-lg hover:bg-red-200"
                                onclick=" return confirm('Voulez-vous vraiment supprimer cette catégorie ?')">
                                Supprimer
                            </button>
                        </form>
                    </div>

                </div>

            @endforeach

        </div>

    </div>

@endsection