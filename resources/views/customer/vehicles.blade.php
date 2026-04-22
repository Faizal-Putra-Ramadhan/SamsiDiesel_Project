<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kendaraan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- List of Vehicles -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-6">Daftar Kendaraan</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse($vehicles as $vehicle)
                            <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-lg font-bold text-red-600 uppercase">{{ $vehicle->brand }} {{ $vehicle->model }}</h4>
                                        <p class="text-sm text-gray-500 font-mono tracking-widest">{{ $vehicle->plate_number }}</p>
                                    </div>
                                    <span class="px-3 py-1 bg-gray-200 dark:bg-gray-800 rounded-full text-xs font-bold uppercase tracking-tighter">Aktif</span>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Servis Terakhir:</span>
                                        <span class="font-semibold">{{ $vehicle->last_service_date ?? 'N/A' }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Jenis Oli:</span>
                                        <span class="font-semibold">{{ $vehicle->oil_type ?? 'N/A' }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Jadwal Ganti Oli:</span>
                                        <span class="font-semibold text-red-600">{{ $vehicle->next_service_date ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="col-span-full py-12 text-center text-gray-500 italic">Belum ada kendaraan terdaftar.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Add Vehicle Form -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-6">Tambah Kendaraan Baru</h3>
                    
                    @if(Session::has('success'))
                        <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <form action="{{ route('customer.add-vehicle') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf
                        <div>
                            <x-input-label for="brand" :value="__('Merk Mobil')" />
                            <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full" placeholder="Toyota, Honda, dll" required />
                        </div>
                        <div>
                            <x-input-label for="model" :value="__('Model / Tipe')" />
                            <x-text-input id="model" name="model" type="text" class="mt-1 block w-full" placeholder="Avanza, Civic, dll" required />
                        </div>
                        <div>
                            <x-input-label for="plate_number" :value="__('Nomor Plat')" />
                            <x-text-input id="plate_number" name="plate_number" type="text" class="mt-1 block w-full" placeholder="B 1234 ABC" required />
                        </div>
                        <div>
                            <x-input-label for="oil_type" :value="__('Jenis Oli')" />
                            <x-text-input id="oil_type" name="oil_type" type="text" class="mt-1 block w-full" placeholder="Shell Helix 5W-30" />
                        </div>
                        <div class="md:col-span-2">
                             <x-primary-button class="bg-red-600 hover:bg-red-700">Submit Data Kendaraan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
