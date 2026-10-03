@extends('layout.app')
@section('content')

    <div class="max-w-6xl mx-auto px-6 py-10">

        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Mes commandes
                </h1>

                <p class="text-gray-500 mt-2">
                    Retrouvez ici toutes vos commandes.
                </p>
            </div>

            <a href="{{ route('home.index') }}" class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700">
                Retour à la boutique
            </a>

        </div>


        @if ($orders->isEmpty())

            <div class="bg-white rounded-xl shadow p-10 text-center">

                <div class="text-5xl mb-4">

                </div>

                <h2 class="text-xl font-semibold text-gray-800 mb-2">
                    Aucune commande
                </h2>

                <p class="text-gray-500 mb-6">
                    Vous n'avez encore passé aucune commande.
                </p>

                <a href="{{ route('home.index') }}"
                    class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                    Découvrir la boutique
                </a>

            </div>

        @else

            <div class="bg-white rounded-xl shadow overflow-hidden">

                <table class="w-full">

                    <thead class="bg-gray-100">

                        <tr>
                            <th class="p-4 text-left">
                                Commande
                            </th>

                            <th class="p-4 text-left">
                                Date
                            </th>

                            <th class="p-4 text-left">
                                Total
                            </th>

                            <th class="p-4 text-left">
                                Statut
                            </th>

                            <th class="p-4 text-left">
                                Action
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($orders as $order)

                            <tr class="border-t hover:bg-gray-50">

                                <td class="p-4 font-semibold">
                                    #{{ $order->id }}
                                </td>

                                <td class="p-4 text-gray-600">
                                    {{ $order->created_at->format('d/m/Y H:i') }}
                                </td>

                                <td class="p-4 font-semibold">
                                    {{ number_format($order->total, 0, ',', ' ') }}
                                    FCFA
                                </td>

                                <td class="p-4">

                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                        {{ $order->status }}
                                    </span>

                                </td>

                                <td class="p-4 flex gap-2">

                                    <a href="{{ route('orders.show', $order) }}"
                                        class=" bg-emerald-600 rounded-lg py-2 text-xl px-3 mb-4 text-white hover:bg-emerald-800 transition-all ease-in-out">
                                        <i class="fa-solid fa-pen"></i>

                                    </a>

                                    <form action="{{ route('orders.delete', $order) }}" method="POST"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class=" bg-red-600 rounded-lg py-2 text-xl px-3 mb-4 text-white hover:bg-red-800 transition-all ease-in-out">
                                            <i class="fa-solid fa-trash"></i>

                                        </button>
                                    </form>


                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>

@endsection