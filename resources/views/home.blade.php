@extends('layout.app')
@section('tilte', 'Ma boutique')
@section('content')

    {{-- Hero --}}

    {{-- <section class=" bg-gradient-to-r from-blue-700  to-teal-500 to-indigo-800 text-white">
        <div class=" max-w-7xl mx-auto px-6 py-24">
            <div class=" grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <p class=" uppercase tracking-widest text-blue-200 font-semibold">
                        Agence digitale
                    </p>
                    <h1 class=" text-5xl md:text-6xl font-extrabold leading-tight mt-4">
                        Nous créon des solution digital pour votre entreprise

                    </h1>
                    <p class=" mt-6 text-lg text-gray-200 leading-8">
                        Site Web moderne, application web, application mobiles,
                        markting digital et accompagnement numérique.

                    </p>

                    <div class=" mt-10 flex gap-4">
                        <a href="/contact"
                            class=" bg-white text-blue-700 px-6 py-3 rounded-lg hover:bg-gray-100 font-semibold">
                            Demander un devis
                        </a>

                        <a href="/service"
                            class=" border border-white-800 px-6 py-3 rounded-lg hover:bg-white hover:text-blue-700">
                            Nos service
                        </a>
                    </div>
                </div>

                <div class=" flex justify-center">
                    <img src="{{ asset('images/km.png') }}" alt="" class=" w-full max-w-lg  rounded-full">
                </div>
            </div>
        </div>
    </section> --}}






    {{-- Contenu --}}
    <main class="max-w-7xl mx-auto px-6 py-10">

        <div class="flex items-center justify-between mb-8 p-4 rounded-xl shadow">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Nos produits
                </h1>

                <p class="text-gray-500 mt-1">
                    Découvrez nos produits disponibles.
                </p>
            </div>
            <form action="{{ route('home.index') }}" method="GET" class="">
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
           

        </div>



        {{-- Produits --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach ($products as $product)

                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition">

                    {{-- Image --}}
                    <div class="h-56 bg-gray-200">

                        @if ($product->photo)

                            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->nom }}"
                                class="w-full h-full object-cover">

                        @else

                            <div class="h-full flex items-center justify-center">

                                <span class="text-gray-400">
                                    Aucune image
                                </span>

                            </div>

                        @endif

                    </div>


                    {{-- Informations --}}
                    <div class="p-5">

                        {{-- Catégorie --}}
                        <p class="text-sm text-blue-600 font-medium">
                            {{ $product->category->nom }}
                        </p>


                        {{-- Nom --}}
                        <h3 class="text-xl font-bold text-gray-800 mt-1">
                            {{ $product->nom }}
                        </h3>


                        {{-- Description --}}
                        <p class="text-gray-500 text-sm mt-2 line-clamp-2">
                            {{ $product->description }}
                        </p>


                        {{-- Prix --}}
                        <p class="text-xl font-bold text-gray-900 mt-4">
                            {{ number_format($product->prix, 0, ',', ' ') }} FCFA
                        </p>


                        {{-- Stock --}}
                        <p class="text-sm text-gray-500 mt-1">
                            Stock : {{ $product->stock }}
                        </p>


                        {{-- Bouton --}}
                        <a href="{{ route('product.show', $product) }}"
                            class="block text-center bg-blue-600 text-white px-4 py-3 rounded-lg mt-5 hover:bg-blue-700 transition">
                            Voir le produit
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </main>


@endsection