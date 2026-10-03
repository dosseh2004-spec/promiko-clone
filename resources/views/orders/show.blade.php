@extends('layout.app')
@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10">

        {{-- En-tête --}}
        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Commande #{{ $order->id }}
                </h1>

                <p class="text-gray-500 mt-2">
                    Passée le {{ $order->created_at->format('d/m/Y à H:i') }}
                </p>
            </div>

            <a href="{{ route('orders.index') }}" class="bg-gray-700 text-white px-5 py-3 rounded-lg hover:bg-gray-800">
                Mes commandes
            </a>

        </div>


        {{-- Informations de la commande --}}
        <div class="bg-white rounded-xl shadow p-6 mb-8">

            <h2 class="text-xl font-bold text-gray-800 mb-5">
                Informations
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <p class="text-gray-500 text-sm">
                        Nom
                    </p>

                    <p class="font-semibold text-gray-800">
                        {{ $order->nom }}
                    </p>
                </div>


                <div>
                    <p class="text-gray-500 text-sm">
                        Email
                    </p>

                    <p class="font-semibold text-gray-800">
                        {{ $order->email }}
                    </p>
                </div>


                <div>
                    <p class="text-gray-500 text-sm">
                        Téléphone
                    </p>

                    <p class="font-semibold text-gray-800">
                        {{ $order->telephone }}
                    </p>
                </div>


                <div>
                    <p class="text-gray-500 text-sm">
                        Statut
                    </p>

                    <span class="inline-block mt-1 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                        {{ $order->status }}
                    </span>
                </div>


                <div class="md:col-span-2">

                    <p class="text-gray-500 text-sm">
                        Adresse
                    </p>

                    <p class="font-semibold text-gray-800">
                        {{ $order->adresse }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Produits --}}
        <div class="bg-white rounded-xl shadow overflow-hidden">

            <div class="p-6 border-b">

                <h2 class="text-xl font-bold text-gray-800">
                    Produits commandés
                </h2>

            </div>


            @foreach ($order->items as $item)

                <div class="flex items-center gap-5 p-6 border-b">

                    {{-- Image --}}
                    <div class="w-20 h-20 flex-shrink-0">

                        @if ($item->product && $item->product->photo)

                            <img src="{{ asset('storage/' . $item->product->photo) }}" alt="{{ $item->product->nom }}"
                                class="w-full h-full object-cover rounded-lg">

                        @else

                            <div class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center">

                            </div>

                        @endif

                    </div>


                    {{-- Informations produit --}}
                    <div class="flex-1">

                        <h3 class="font-semibold text-gray-800">

                            {{ $item->product ? $item->product->nom : 'Produit supprimé' }}

                        </h3>

                        <p class="text-gray-500 text-sm mt-1">
                            Quantité : {{ $item->quantite }}
                        </p>

                    </div>


                    {{-- Prix --}}
                    <div class="text-right">

                        <p class="font-semibold text-gray-800">
                            {{ number_format($item->prix, 0, ',', ' ') }} FCFA
                        </p>

                        <p class="text-gray-500 text-sm">
                            {{ number_format($item->prix * $item->quantite, 0, ',', ' ') }} FCFA
                        </p>

                    </div>

                </div>

            @endforeach


            {{-- Total --}}
            <div class="p-6 flex justify-between items-center">

                <span class="text-xl font-bold text-gray-800">
                    Total
                </span>

                <span class="text-2xl font-bold text-blue-600">
                    {{ number_format($order->total, 0, ',', ' ') }} FCFA
                </span>

            </div>

        </div>

    </div>

@endsection