<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Produk / Sparepart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Upload New Product -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-6">Tambah Produk Terkait</h3>
                    
                    @if(Session::has('success'))
                        <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.store-product') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @csrf
                        <div class="md:col-span-1">
                            <x-input-label for="name" :value="__('Nama Produk')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" placeholder="Shell Helix 4L" required />
                        </div>
                        <div class="md:col-span-1">
                            <x-input-label for="shopee_url" :value="__('Link Shopee')" />
                            <x-text-input id="shopee_url" name="shopee_url" type="url" class="mt-1 block w-full" placeholder="https://shopee.co.id/..." />
                        </div>
                        <div class="md:col-span-1">
                            <x-input-label for="image" :value="__('Gambar Produk')" />
                            <input type="file" id="image" name="image" class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100" required />
                        </div>
                        <div class="md:col-span-3">
                            <x-primary-button class="bg-red-600 hover:bg-red-700">Simpan Produk</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- List of Products -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-6">Daftar Produk Aktif</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($products as $product)
                            <div class="bg-gray-100 dark:bg-gray-900 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700">
                                <div class="aspect-square bg-gray-200 dark:bg-gray-800">
                                    <img src="{{ $product->image_url }}" class="w-full h-full object-cover" alt="{{ $product->name }}">
                                </div>
                                <div class="p-4">
                                    <h4 class="font-bold text-sm mb-2 line-clamp-1 uppercase">{{ $product->name }}</h4>
                                    @if($product->shopee_url)
                                        <a href="{{ $product->shopee_url }}" target="_blank" class="text-blue-500 text-xs truncate block mb-4">Shopee &rarr;</a>
                                    @else
                                        <span class="text-gray-400 text-xs block mb-4">Tidak ada link Shopee</span>
                                    @endif
                                    <form action="{{ route('admin.destroy-product', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full py-2 bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg text-xs font-bold hover:bg-red-600 hover:text-white transition">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
