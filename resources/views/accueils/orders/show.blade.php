@extends('layout.app')
@section('content')
    <div class="max-w-6xl mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold">
                    Commande #{{ $order->id }}
                </h1>

                <p class="text-gray-500">
                    Détails de la commande
                </p>
            </div>

            <a href="{{ route('accueils.orders') }}" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">
                Retour
            </a>
        </div>


        {{-- Informations client --}}
        <div class="bg-white shadow rounded-xl p-6 mb-6">

            <h2 class="text-xl font-bold mb-4">
                Informations du client
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <p class="text-gray-500">Nom</p>

                    <p class="font-semibold">
                        {{ $order->user ? $order->user->name : $order->nom }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Email</p>

                    <p class="font-semibold">
                        {{ $order->email }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Téléphone</p>

                    <p class="font-semibold">
                        {{ $order->telephone }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Adresse</p>

                    <p class="font-semibold">
                        {{ $order->adresse }}
                    </p>
                </div>

            </div>

        </div>


        {{-- Informations commande --}}
        <div class="bg-white shadow rounded-xl p-6">

            <h2 class="text-xl font-bold mb-4">
                Produits commandés
            </h2>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-gray-100">

                        <tr>
                            <th class="p-4 text-left">Produit</th>
                            <th class="p-4 text-left">Prix</th>
                            <th class="p-4 text-left">Quantité</th>
                            <th class="p-4 text-left">Sous-total</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($order->items as $item)

                                            <tr class="border-b">

                                                <td class="p-4">

                                                    {{ $item->product
                                ? $item->product->nom
                                : 'Produit supprimé'
                                                                                                                                                    }}

                                                </td>

                                                <td class="p-4">
                                                    {{ number_format($item->prix, 2, ',', ' ') }} FCFA
                                                </td>

                                                <td class="p-4">
                                                    {{ $item->quantite }}
                                                </td>

                                                <td class="p-4 font-semibold">

                                                    {{ number_format(
                                $item->prix * $item->quantite,
                                2,
                                ',',
                                ' '
                            ) }}
                                                    FCFA

                                                </td>

                                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- Total --}}
            <div class="flex justify-end mt-6">

                <div class="text-right">

                    <p class="text-gray-500">
                        Total de la commande
                    </p>

                    <p class="text-2xl font-bold">
                        {{ number_format($order->total, 2, ',', ' ') }} FCFA
                    </p>

                </div>

            </div>

        </div>

    </div>

@endsection