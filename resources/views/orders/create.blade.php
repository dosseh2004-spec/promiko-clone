@extends('layout.app')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            Passer la commande
        </h1>

        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-xl font-semibold mb-6">
                Vos informations
            </h2>

            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block mb-2 font-medium">
                        Nom complet
                    </label>

                    <input type="text" name="nom" class="w-full border rounded-lg px-4 py-3" placeholder="Votre nom">
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-medium">
                        Email
                    </label>

                    <input type="email" name="email" class="w-full border rounded-lg px-4 py-3"
                        placeholder="exemple@gmail.com">
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-medium">
                        Téléphone
                    </label>

                    <input type="text" name="telephone" class="w-full border rounded-lg px-4 py-3"
                        placeholder="Votre numéro">
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-medium">
                        Adresse
                    </label>

                    <textarea name="adresse" class="w-full border rounded-lg px-4 py-3" rows="4"
                        placeholder="Votre adresse de livraison"></textarea>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                    Valider la commande
                </button>

            </form>

        </div>

    </div>
@endsection