<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Produk / Sparepart') }}
        </h2>
    </x-slot>

    <div class="space-y-8">

        @if(Session::has('success'))
            <div class="p-4 bg-green-500/10 border border-green-500/30 text-green-300 rounded-xl flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="bg-slate-800 shadow-sm sm:rounded-lg overflow-hidden border border-slate-700">
            <div class="p-6 text-slate-100">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Daftar Produk Aktif</h3>
                    <button type="button" x-data x-on:click="$dispatch('open-modal', 'product-form')" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-bold rounded-lg transition-colors">
                        + Tambah Produk
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($products as $product)
                        <div class="bg-slate-900 rounded-2xl overflow-hidden border border-slate-700 hover:border-blue-500/50 transition-all duration-200">
                            <div class="aspect-square bg-slate-800">
                                <img src="{{ $product->image_url }}" class="w-full h-full object-cover" alt="{{ $product->name }}">
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-sm mb-2 line-clamp-1 uppercase text-white">{{ $product->name }}</h4>
                                @if($product->shopee_url)
                                    <a href="{{ $product->shopee_url }}" target="_blank" class="text-blue-400 text-xs truncate block mb-4 hover:text-blue-300">Shopee &rarr;</a>
                                @else
                                    <span class="text-slate-500 text-xs block mb-4">Tidak ada link Shopee</span>
                                @endif
                                <div class="flex gap-2">
                                    <button type="button" x-data x-on:click="$dispatch('open-modal', 'edit-product-{{ $product->id }}')" class="flex-1 py-2 bg-slate-700 text-slate-300 rounded-lg text-xs font-bold hover:bg-amber-600 hover:text-white transition-colors">
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.destroy-product', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full py-2 bg-slate-700 text-slate-300 rounded-lg text-xs font-bold hover:bg-red-600 hover:text-white transition-colors">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <x-modal name="edit-product-{{ $product->id }}" :show="$errors->any() && old('_edit_id') == $product->id" maxWidth="2xl" focusable>
                            <div class="bg-slate-800 flex flex-col max-h-[88vh]">
                                <div class="shrink-0 px-6 py-5 border-b border-slate-700 flex items-start justify-between gap-4">
                                    <div>
                                        <h3 class="text-lg font-bold text-white flex items-center gap-2.5">
                                            Edit Produk
                                        </h3>
                                        <p class="mt-0.5 text-sm text-slate-400">{{ $product->name }}</p>
                                    </div>
                                    <button type="button" x-on:click="$dispatch('close')" class="rounded-lg p-2 text-slate-400 hover:bg-slate-700 hover:text-white transition shrink-0" aria-label="Tutup modal">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                    </button>
                                </div>

                                <form action="{{ route('admin.update-product', $product) }}" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col min-h-0">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="_edit_id" value="{{ $product->id }}">

                                    <div class="flex-1 overflow-y-auto px-6 py-6 space-y-6">
                                        @if($errors->any() && old('_edit_id') == $product->id)
                                            <div class="rounded-xl border border-red-500/30 bg-red-500/10 p-4 text-sm text-red-200">
                                                <div class="font-bold text-red-100">Data belum bisa disimpan.</div>
                                                <ul class="mt-2 list-disc space-y-1 pl-5">
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div>
                                            <x-input-label for="edit-name-{{ $product->id }}" :value="__('Nama Produk')" class="text-slate-300" />
                                            <x-text-input id="edit-name-{{ $product->id }}" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $product->name) }}" required />
                                        </div>

                                        <div>
                                            <x-input-label for="edit-shopee_url-{{ $product->id }}" :value="__('Link Shopee')" class="text-slate-300" />
                                            <x-text-input id="edit-shopee_url-{{ $product->id }}" name="shopee_url" type="url" class="mt-1 block w-full" value="{{ old('shopee_url', $product->shopee_url) }}" placeholder="https://shopee.co.id/..." />
                                        </div>

                                        <div>
                                            <x-input-label for="edit-image-{{ $product->id }}" :value="__('Gambar Produk')" class="text-slate-300" />
                                            <p class="text-xs text-slate-500 mt-1 mb-2">Kosongkan jika tidak ingin mengganti gambar.</p>
                                            @if($product->image_path)
                                                <div class="mb-3">
                                                    <img src="{{ $product->image_url }}" class="w-20 h-20 object-cover rounded-lg border border-slate-700" alt="{{ $product->name }}">
                                                </div>
                                            @endif
                                            <input type="file" id="edit-image-{{ $product->id }}" name="image" class="mt-1 block w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-500/20 file:text-amber-400 hover:file:bg-amber-500/30" />
                                        </div>
                                    </div>

                                    <div class="shrink-0 px-6 py-4 border-t border-slate-700 bg-slate-800/95 backdrop-blur-sm flex items-center justify-end gap-3">
                                        <button type="button" x-on:click="$dispatch('close')" class="px-4 py-2 text-sm font-bold text-slate-400 hover:text-white transition-colors">Batal</button>
                                        <x-primary-button class="bg-amber-600 hover:bg-amber-700">Perbarui Produk</x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </x-modal>
                    @empty
                        <div class="col-span-full text-center py-12 text-slate-500">
                            <p class="text-lg font-medium">Belum ada produk.</p>
                            <p class="text-sm mt-1">Klik "Tambah Produk" untuk menambahkan produk pertama.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <x-modal name="product-form" :show="$errors->any() && !old('_edit_id')" maxWidth="2xl" focusable>
        <div class="bg-slate-800 flex flex-col max-h-[88vh]">
            <div class="shrink-0 px-6 py-5 border-b border-slate-700 flex items-start justify-between gap-4">
                <div>
                    <h3 class="text-lg font-bold text-white flex items-center gap-2.5">
                        Tambah Produk Baru
                    </h3>
                    <p class="mt-0.5 text-sm text-slate-400">Isi data produk / sparepart yang ingin ditampilkan.</p>
                </div>
                <button type="button" x-on:click="$dispatch('close')" class="rounded-lg p-2 text-slate-400 hover:bg-slate-700 hover:text-white transition shrink-0" aria-label="Tutup modal">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <form action="{{ route('admin.store-product') }}" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col min-h-0">
                @csrf

                <div class="flex-1 overflow-y-auto px-6 py-6 space-y-6">
                    @if($errors->any() && !old('_edit_id'))
                        <div class="rounded-xl border border-red-500/30 bg-red-500/10 p-4 text-sm text-red-200">
                            <div class="font-bold text-red-100">Data belum bisa disimpan.</div>
                            <ul class="mt-2 list-disc space-y-1 pl-5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <x-input-label for="name" :value="__('Nama Produk')" class="text-slate-300" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" placeholder="Shell Helix 4L" required />
                    </div>

                    <div>
                        <x-input-label for="shopee_url" :value="__('Link Shopee')" class="text-slate-300" />
                        <x-text-input id="shopee_url" name="shopee_url" type="url" class="mt-1 block w-full" placeholder="https://shopee.co.id/..." />
                    </div>

                    <div>
                        <x-input-label for="image" :value="__('Gambar Produk')" class="text-slate-300" />
                        <input type="file" id="image" name="image" class="mt-1 block w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-500/20 file:text-red-400 hover:file:bg-red-500/30" required />
                    </div>
                </div>

                <div class="shrink-0 px-6 py-4 border-t border-slate-700 bg-slate-800/95 backdrop-blur-sm flex items-center justify-end gap-3">
                    <button type="button" x-on:click="$dispatch('close')" class="px-4 py-2 text-sm font-bold text-slate-400 hover:text-white transition-colors">Batal</button>
                    <x-primary-button class="bg-red-600 hover:bg-red-700">Simpan Produk</x-primary-button>
                </div>
            </form>
        </div>
    </x-modal>
</x-admin-layout>
