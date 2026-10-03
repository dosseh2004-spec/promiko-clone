@extends('layout.app')
@section('tilte', 'connexion')
@section('content')
    <div class=" bg-gradient-to-r from-blue-700  to-teal-500 to-indigo-800">
        <div class="min-h-screen flex items-center justify-center px-6">

            <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow">

                <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
                    Connexion
                </h1>

                {{-- Message de succès --}}
                @if (session('success'))
                    <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Erreur --}}
                @if (session('error'))
                    <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">

                    @csrf

                    {{-- Email --}}
                    <div class="mb-5">

                        <label class="block text-gray-700 font-medium mb-2">
                            Email
                        </label>

                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="exemple@gmail.com">

                    </div>

                    {{-- Mot de passe --}}
                    <div class="mb-6">

                        <label class="block text-gray-700 font-medium mb-2">
                            Mot de passe
                        </label>

                        <input type="password" name="password"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Votre mot de passe">

                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Se connecter
                    </button>

                </form>

                <p class="text-center text-gray-600 mt-6">
                    Vous n'avez pas encore de compte ?
                    <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">
                        Créer un compte
                    </a>
                </p>

            </div>

        </div>
    </div>

@endsection