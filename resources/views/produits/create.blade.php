@extends('layout.app')
@section('content')

    <div class="max-w-2xl mx-auto px-6 py-10">

        <div class="bg-white rounded-xl shadow p-8">

            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Ajouter un produit
            </h1>

            <p class="text-gray-500 mb-8">
                Ajoutez un nouveau produit à votre boutique.
            </p>

            @if ($errors->any())

                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">

                    <ul class="list-disc list-inside">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{  route('products.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">

                @csrf

                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">
                        Nom du produit
                    </label>

                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>

                    <textarea id="description" name="description" rows="4"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="prix" class="block text-sm font-medium text-gray-700 mb-2">
                        Prix
                    </label>

                    <input type="number" id="prix" name="prix" value="{{ old('prix') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3">
                </div>

                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">
                        Stock
                    </label>

                    <input type="number" id="stock" name="stock" value="{{ old('stock') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3">
                </div>

                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">
                        Photo du produit
                    </label>

                    <input type="file" id="photo" name="photo" accept="image/*"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3">
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Catégorie
                    </label>

                    <select id="category_id" name="category_id" class="w-full border border-gray-300 rounded-lg px-4 py-3">

                        <option value="">
                            -- Choisir une catégorie --
                        </option>

                        @foreach ($categories as $category)

                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->nom }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="flex items-center gap-3">

                    <button type="submit" class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700 transition">
                        Ajouter le produit
                    </button>

                    <a href="{{ route('products') }}"
                        class="bg-gray-100 text-gray-700 px-5 py-3 rounded-lg hover:bg-gray-200 transition">
                        Annuler
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection