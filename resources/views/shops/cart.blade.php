@extends('layout.app')
@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10">j

        <div class="flex items-center justify-between mb-8">

            <h1 class="text-3xl font-bold text-gray-800">
                Mon panier
            </h1>

            <a href="{{ route('home.index') }}" class="text-blue-600 hover:underline">
                Continuer mes achats
            </a>

        </div>

        @if (session('success'))
            <div class=" bg-green-100 border-green-300 text-green-700 rounded-lg p-3 mb-5 border">
                {{ session('success') }}
            </div>
        @endif



        @if (session('error'))
            <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">
                {{ session('error') }}
            </div>
        @endif




        @if (empty($cart))

            <div class="bg-white rounded-xl shadow-sm p-8 text-center">

                <p class="text-gray-500 text-lg">
                    Votre panier est vide.
                </p>

                <a href="{{ route('home.index') }}"
                    class="inline-block mt-5 bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700">
                    Voir les produits
                </a>

            </div>

        @else

            @php
                $total = 0;
            @endphp


            <div class="space-y-4">

                @foreach ($cart as $key => $product)

                    @php
                        $sousTotal = $product['prix'] * $product['quantite'];
                        $total += $sousTotal;
                    @endphp


                    <div class="bg-white rounded-xl shadow-sm p-5">

                        <div class="flex  items-center gap-5">


                            @if ($product['photo'])

                                <img src="{{ asset('storage/' . $product['photo']) }}" alt="{{ $product['nom'] }}"
                                    class="w-24 h-24 object-cover rounded-lg">

                            @else

                                <div class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-400 text-sm">
                                        Aucune image
                                    </span>
                                </div>

                            @endif



                            <div class="flex-1">

                                <h2 class="text-xl font-bold text-gray-800">
                                    {{ $product['nom'] }}
                                </h2>

                                <p class="text-gray-500 mt-1">
                                    Prix unitaire :
                                    {{ number_format($product['prix'], 0, ',', ' ') }}
                                    FCFA
                                </p>

                                <div class="flex items-center gap-3 mt-3">


                                    <form action="{{ route('shops.remove', $key) }}" method="POST">
                                        @csrf

                                        <button type="submit" class="w-9 h-9 bg-gray-200 rounded-lg hover:bg-gray-300">
                                            -
                                        </button>
                                    </form>



                                    <span class="font-semibold text-lg">
                                        {{ $product['quantite'] }}
                                    </span>



                                    <form action="{{ route('shops.add', $key) }}" method="POST">
                                        @csrf

                                        <button type="submit" class="w-9 h-9 bg-gray-200 rounded-lg hover:bg-gray-300">
                                            +
                                        </button>
                                    </form>

                                    <form action="{{ route('shops.destroy', $key) }}" method="POST">
                                        @csrf

                                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                            Supprimer
                                        </button>
                                    </form>

                                </div>

                            </div>



                            <div class="text-right">

                                <p class="text-sm text-gray-500">
                                    Sous-total
                                </p>

                                <p class="text-xl font-bold text-gray-800">
                                    {{ number_format($sousTotal, 0, ',', ' ') }}
                                    FCFA
                                </p>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- Total --}}
            <div class="bg-white rounded-xl shadow-sm p-6 mt-8">

                <div class="flex items-center justify-between">

                    <span class="text-xl font-bold text-gray-800">
                        Total
                    </span>

                    <span class="text-2xl font-bold text-blue-600">
                        {{ number_format($total, 0, ',', ' ') }} FCFA
                    </span>

                </div>


                <a href="{{ route('orders.create') }}"
                    class="block text-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                    Passer la commande
                </a>

            </div>

        @endif

    </div>

@endsection