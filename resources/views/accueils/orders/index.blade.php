@extends('layout.app')
@section('content')

    <div class="max-w-7xl mx-auto p-8">

        <h1 class="text-3xl font-bold text-gray-800">
            Toutes les commandes
        </h1>

        <p class="text-gray-500 mt-2">
            Gestion des commandes de la boutique
        </p>

        <div class="bg-white rounded-xl shadow mt-8 overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-4 text-left">ID</th>
                        <th class="p-4 text-left">Client</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Total</th>
                        <th class="p-4 text-left">Statut</th>
                        <th class="p-4 text-left">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($orders as $order)

                        <tr class="border-t">

                            <td class="p-4">
                                #{{ $order->id }}
                            </td>

                            <td class="p-4">
                                {{ $order->user ? $order->user->name : 'Utilisateur inconnu' }}
                            </td>

                            <td class="p-4">
                                {{ $order->email }}
                            </td>

                            <td class="p-4">
                                {{ number_format($order->total, 0, ',', ' ') }} FCFA
                            </td>


                            <td class="p-4">

                                <form action="{{ route('accueil.store', $order) }}" method="POST">

                                    @csrf
                                    @method('PUT')

                                    <select name="statut" onchange="this.form.submit()" class="border rounded-lg px-3 py-2">

                                        <option value="en attente" {{ $order->status === 'en attente' ? 'selected' : '' }}>
                                            En attente
                                        </option>

                                        <option value="confirmée" {{ $order->status === 'confirmée' ? 'selected' : '' }}>
                                            Confirmée
                                        </option>

                                        <option value="expédiée" {{ $order->status === 'expédiée' ? 'selected' : '' }}>
                                            Expédiée
                                        </option>

                                        <option value="livrée" {{ $order->status === 'livrée' ? 'selected' : '' }}>
                                            Livrée
                                        </option>

                                        <option value="annulée" {{ $order->status === 'annulée' ? 'selected' : '' }}>
                                            Annulée
                                        </option>

                                    </select>

                                </form>

                            </td>

                            <td class="p-4">
                                <a href="{{ route('accueil.show', $order) }}"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    Voir le détail
                                </a>
                            </td>


                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection