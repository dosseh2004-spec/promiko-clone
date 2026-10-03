@extends('layout.app')
@section('content')
        <section class=" max-w-6xl mx-auto p-8">

            <div class="mb-8">


                @if (auth()->check())
                    @if (auth()->user()->role === "admin")
                        <h1 class="text-3xl font-bold text-gray-800">
                            Dashboard
                        </h1>
                        <p class="text-gray-500 mt-2">
                            Bienvenue {{ auth()->user()->name }}
                        </p>
                    @endif
                @endif

            </div>
            <div class="grid grid-cols-1 md:grid-cols-2  gap-6">

                {{-- Produits --}}
                <div class="bg-white  rounded-xl shadow p-6">
                    <p class="text-gray-500">
                        Produits
                    </p>

                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $nombreProduits }}
                    </p>
                </div>


                {{-- Catégories --}}
                <div class="bg-white rounded-xl shadow p-6">
                    <p class="text-gray-500">
                        Catégories
                    </p>

                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $nombreCategories }}
                    </p>
                </div>


                {{-- Commandes --}}
                <div class="bg-white rounded-xl shadow p-6">
                    <p class="text-gray-500">
                        Commandes
                    </p>

                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $nombreCommandes }}
                    </p>
                </div>


                {{-- Clients --}}
                <div class="bg-white rounded-xl shadow p-6">
                    <p class="text-gray-500">
                        Clients
                    </p>

                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $nombreClients }}
                    </p>
                </div>

            </div>

            {{-- Actions rapides --}}
            <div class="mt-10">

                <h2 class="text-xl font-bold text-gray-800 mb-5">
                    Actions rapides
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

                    {{-- Ajouter un produit --}}
                    <a href="{{ route('products.create') }}"
                        class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">

                        <p class="font-semibold text-gray-800">
                            + Ajouter un produit
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Créer un nouveau produit
                        </p>
                    </a>


                    {{-- Gérer les produits --}}
                    <a href="{{ route('products') }}" class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">

                        <p class="font-semibold text-gray-800">
                            Gérer les produits
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Modifier ou supprimer un produit
                        </p>
                    </a>


                    {{-- Gérer les catégories --}}
                    <a href="{{ route('categories') }}" class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">

                        <p class="font-semibold text-gray-800">
                            Gérer les catégories
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Ajouter ou modifier une catégorie
                        </p>
                    </a>


                    {{-- Voir les commandes --}}
                    <a href="{{ route('accueils.orders') }}"
                        class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">

                        <p class="font-semibold text-gray-800">
                            Voir les commandes
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Consulter les commandes
                        </p>
                    </a>

                </div>

            </div>


        </section>
@endsection