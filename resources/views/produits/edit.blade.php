@extends('layout.app')
@section('content')

    <div class="max-w-2xl mx-auto px-6 py-10">

        <div class="bg-white rounded-xl shadow p-8">

            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Modifier le produit
            </h1>

            <p class="text-gray-500 mb-8">
                Modifiez les informations du produit.
            </p>

            @if ($errors->any())

                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">

                    <ul class="list-disc list-inside">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('products.update', $product) }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6"
            >

                @csrf
                @method('PUT')


                <!-- Nom -->

                <div>

                    <label
                        for="nom"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Nom du produit
                    </label>

                    <input
                        type="text"
                        id="nom"
                        name="nom"
                        value="{{ old('nom', $product->nom) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >

                </div>


                <!-- Description -->

                <div>

                    <label
                        for="description"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >{{ old('description', $product->description) }}</textarea>

                </div>


                <!-- Prix -->

                <div>

                    <label
                        for="prix"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Prix
                    </label>

                    <input
                        type="number"
                        id="prix"
                        name="prix"
                        value="{{ old('prix', $product->prix) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >

                </div>


                <!-- Stock -->

                <div>

                    <label
                        for="stock"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Stock
                    </label>

                    <input
                        type="number"
                        id="stock"
                        name="stock"
                        value="{{ old('stock', $product->stock) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >

                </div>


                <!-- Photo -->

                <div>

                    <label
                        for="photo"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Nouvelle photo
                    </label>

                    <input
                        type="file"
                        id="photo"
                        name="photo"
                        accept="image/*"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >

                    @if ($product->photo)

                        <img
                            src="{{ asset('storage/' . $product->photo) }}"
                            alt="{{ $product->nom }}"
                            class="w-32 h-32 object-cover rounded-lg mt-4"
                        >

                    @endif

                </div>


                <!-- Catégorie -->

                <div>

                    <label
                        for="category_id"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Catégorie
                    </label>

                    <select
                        id="category_id"
                        name="category_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >

                        @foreach ($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->nom }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- Boutons -->

                <div class="flex items-center gap-3">

                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700 transition"
                    >
                        Enregistrer
                    </button>

                    <a
                        href="{{ route('products') }}"
                        class="bg-gray-100 text-gray-700 px-5 py-3 rounded-lg hover:bg-gray-200 transition"
                    >
                        Annuler
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection