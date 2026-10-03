@extends('layout.app')
@section('content')
    <main class="max-w-6xl mx-auto px-6 py-10">

        <a href="{{ route('home.index') }}" class="inline-block text-blue-600 hover:underline mb-6">
            Retour aux produits
        </a>


        <div class="bg-white rounded-xl shadow-sm overflow-hidden">

            <div class="grid grid-cols-1 md:grid-cols-2 ">



                <div class="h-96 bg-gray-200">

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



                <div class="p-8">


                    <p class="text-blue-600 font-medium">
                        {{ $product->category->nom }}
                    </p>



                    <h1 class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $product->nom }}
                    </h1>



                    <p class="text-gray-600 mt-5 leading-relaxed">
                        {{ $product->description }}
                    </p>



                    <p class="text-3xl font-bold text-gray-900 mt-8">
                        {{ number_format($product->prix, 0, ',', ' ') }} FCFA
                    </p>



                    <p class="text-gray-500 mt-3">
                        Stock disponible :
                        <span class="font-semibold">
                            {{ $product->stock }}
                        </span>
                    </p>

                    <form action="{{ route('shops.add', $product) }}" method="POST">
                        @csrf

                        <button class="w-full bg-blue-600 text-white py-3 rounded-lg mt-8 hover:bg-blue-700 transition">
                            Ajouter au panier
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </main>

@endsection