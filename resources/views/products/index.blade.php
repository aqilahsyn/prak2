<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <h1 class="text-2xl font-bold mb-6 text-blue-500">Daftar Produk</h1>

        <!-- Tombol untuk menambahkan produk baru -->
        <a href="{{ route('products.create') }}" 
           class="inline-block px-4 py-2 mb-4 text-white bg-green-600 hover:bg-green-700 rounded-md">
            Tambah Produk Baru
        </a>

        <!-- Menampilkan pesan sukses -->
        @if(session('success'))
            <div class="mb-4 p-4 text-sm text-green-800 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel daftar produk -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-6 py-3 text-left">Nama Produk</th>
                        <th class="px-6 py-3 text-left">Deskripsi</th>
                        <th class="px-6 py-3 text-left">Harga</th>
                        <th class="px-6 py-3 text-left">Kategori</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm divide-y divide-gray-200">
                    @foreach($products as $product)
                        <tr>
                            <td class="px-6 py-4">{{ $product->name }}</td>
                            <td class="px-6 py-4">{{ $product->description }}</td>
                            <td class="px-6 py-4">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">{{ $product->category->name }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="inline-block px-3 py-1 text-sm text-white bg-yellow-500 hover:bg-yellow-600 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 text-sm text-white bg-red-600 hover:bg-red-700 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $products->links() }}
        </div>

    </div>
</x-app-layout>
