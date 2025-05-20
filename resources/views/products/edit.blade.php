<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">

        <h1 class="text-2xl font-bold mb-6 text-blue-500">Edit Produk</h1>

        <!-- Menampilkan error validasi jika ada -->
        @if ($errors->any())
            <div class="mb-6 p-4 text-sm text-red-800 bg-red-100 rounded-lg">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form untuk mengedit produk -->
        <form method="POST" action="{{ route('products.update', $product->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
                <textarea id="description" name="description" rows="4" required
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $product->description }}</textarea>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Harga Produk</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" step="0.01" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori Produk</label>
                <select id="category_id" name="category_id" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="px-6 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md shadow-sm">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
