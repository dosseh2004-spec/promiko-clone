@extends('layout.app')
@section('content')

    <div class="max-w-2xl mx-auto px-6 py-10">

        <div class="bg-white rounded-xl shadow p-8">

            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Modifier la catégorie
            </h1>

            <p class="text-gray-500 mb-8">
                Modifiez les informations de cette catégorie.
            </p>


            {{-- Erreurs --}}

            @if ($errors->any())

                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">

                    <ul class="list-disc list-inside">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-6">

                @csrf

                @method('PUT')


                {{-- Nom --}}

                <div>

                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">
                        Nom
                    </label>

                    <input type="text" id="nom" name="nom" value="{{ old('nom', $category->nom) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                </div>


                {{-- Description --}}

                <div>

                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>

                    <textarea id="description" name="description" rows="5"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $category->description) }}</textarea>

                </div>


                {{-- Boutons --}}

                <div class="flex items-center gap-3">

                    <button type="submit" class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700 transition">
                        Enregistrer les modifications
                    </button>

                    <a href="{{ route('categories') }}"
                        class="bg-gray-100 text-gray-700 px-5 py-3 rounded-lg hover:bg-gray-200 transition">
                        Annuler
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection