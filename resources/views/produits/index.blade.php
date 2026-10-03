@extends('layout.app')
@section('tilte', 'Nos Produits')
@section('content')

    <div class="max-w-6xl mx-auto px-6 py-10">


        @if (session('success'))
            <div class=" bg-green-100 border-green-300 text-green-700 rounded-lg p-3 mb-5 border">
                {{ session('success') }}
            </div>
        @endif

        <!-- En-tête -->

        <div class="flex items-center justify-between mb-8 p-4 rounded-xl shadow">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Nos produits
                </h1>

                <p class="text-gray-500 mt-1">
                    Gérez les produits de votre boutique.
                </p>
            </div>
            <form action="{{ route('products') }}" method="GET" class="">
                <div class=" ">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Produit..."
                        class=" border rounded-xl px-4 py-2">
                    <select name="category" id="" class="border rounded-xl px-4 py-2">
                        <option value="">Tout les catégories</option>
                        @foreach ($categories as $category)

                            <option value="{{ $category->id }}" @selected(request('category') === $category->id)>
                                {{ $category->nom }}
                            </option>

                        @endforeach
                    </select>
                    <button type="submit" class=" bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                        Recherche
                    </button>
                </div>
            </form>
            <a href="{{ route('products.create') }}"
                class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700 transition">
                + Ajouter un produit
            </a>

        </div>


        <!-- Grille des produits -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($products as $product)

                <div class="bg-white rounded-xl shadow overflow-hidden space-y-4">
                    <div class="h-56 bg-gray-200 ">

                        @if ($product->photo)

                            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->nom }}"
                                class=" object-cover w-full h-full">


                        @else
                            <div class="h-full flex items-center justify-center">
                                <span class="text-gray-400">
                                    Aucune image
                                </span>
                            </div>

                        @endif

                    </div>


                    <div class="p-8  bg-white ">

                        <p class="text-sm text-blue-600 font-medium">
                            {{ $product->category->nom }}
                        </p>

                        <h2 class="text-xl font-bold text-gray-800 mt-1">
                            {{ $product->nom }}
                        </h2>

                        <p class="text-gray-500 text-sm mt-2">
                            {{ $product->description }}
                        </p>

                        <div class="flex items-center justify-between mt-5">

                            <span class="text-xl font-bold text-gray-800">
                                {{ $product->prix }} FCFA
                            </span>

                            <span class="text-sm text-gray-500">
                                Stock : {{ $product->stock }}
                            </span>

                        </div>

                        <div class="flex gap-2 mt-5">

                            <a href="{{ route('products.edit', $product) }}"
                                class="flex-1 text-center bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">
                                Modifier
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="flex-1 bg-red-100 text-red-600 px-4 py-2 rounded-lg hover:bg-red-200"
                                    onclick=" return confirm('Voulez-vous vraiment supprimer ce product ?')">
                                    Supprimer
                                </button>
                            </form>
                        </div>

                    </div>

                </div>

            @endforeach

        </div>
        <div class=" mt-4">
            {{ $products->links() }}
        </div>
    </div>


@endsection