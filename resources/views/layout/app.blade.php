<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('tilte', 'Promise_Clone')
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" bg-gray-100">
    <nav class=" bg-white shadow-md">
        <div class=" max-w-7xl mx-auto px-6">
            <div class=" flex justify-between items-center h-20">
                <a href="/" class=" flex items-center  space-x-6 text-3xl font-bold text-blue-700">
                    <img src="{{ asset('images/ff.jpg') }}" class=" h-14 w-14 rounded-full"  alt="">
                    Dashboard
                </a>

                @if (auth()->check())
                    @if (auth()->user()->role === "admin")
                        <ul class=" hidden md:flex space-x-8 font-medium">
                            <li>
                                <a href="{{ route('accueils.index') }}" class=" hover:text-blue-600 hover:underline">
                                    Accueil
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('products') }}" class=" hover:text-blue-600">
                                    Produits
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('categories') }}" class=" hover:text-blue-600">
                                    Categories
                                </a>
                            </li>
                            <li>
                                <a href="/contact" class=" hover:text-blue-600">
                                    Contact
                                </a>
                            </li>
                        </ul>
                        <a href="{{ route('accueils.orders') }}" class=" text-blue-600 hover:underline-offset-4"> Commandes</a>



                    @endif

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                            Déconnexion
                        </button>
                    </form>
                    @if (auth()->user()->role !== "admin")
                        <a href="{{ route('orders.index') }}" class=" text-blue-600 hover:underline">commande</a>

                    @endif
                @endif

                @if (auth()->guest())
                    <div class="">
                        <a href="{{ route('register') }}" class=" text-blue-600 hover:underline">Inscrire</a>
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline ">Connexion</a>
                    </div>
                @endif

                <a href="{{ route('shops.cart') }}"
                    class=" bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                    Panier</a>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>

    @include('portails.footer')
</body>

</html>