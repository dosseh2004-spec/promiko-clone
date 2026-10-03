@extends('layout.app')
@section('tilte', 'Inscription')
@section('content')
    <div class="bg-gradient-to-r from-blue-700  to-teal-500 to-indigo-800">

        <div class="min-h-screen flex items-center justify-center px-6">

            <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow">

                <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
                    Créer un compte
                </h1>


                @if ($errors->any())
                    <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg mb-6">

                        <ul class="list-disc list-inside">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">

                    @csrf


                    <div class="mb-5">

                        <label class="block text-gray-700 font-medium mb-2">
                            Nom
                        </label>

                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Votre nom">

                    </div>

                    <div class="mb-5">

                        <label class="block text-gray-700 font-medium mb-2">
                            Email
                        </label>

                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="exemple@gmail.com">

                    </div>

                    <div class="mb-5">

                        <label class="block text-gray-700 font-medium mb-2">
                            Mot de passe
                        </label>

                        <input type="password" name="password" value="{{ old('password') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Minimum 6 caractères">

                    </div>

                    <div class="mb-6">

                        <label class="block text-gray-700 font-medium mb-2">
                            Confirmer le mot de passe
                        </label>

                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Confirmez votre mot de passe">

                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Créer mon compte
                    </button>

                </form>
                <p class="text-center text-gray-600 mt-6">
                    Vous avez déjà de compte !
                    <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">
                        Se connecter
                    </a>
                </p>

            </div>

        </div>
    </div>
@endsection