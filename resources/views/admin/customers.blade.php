<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold">Daftar Pelanggan</h3>
                        <div class="relative">
                            <input type="text" placeholder="Cari Nama/WA..." class="bg-gray-100 dark:bg-gray-900 border-none rounded-lg text-sm px-4 py-2 w-64 focus:ring-red-600">
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nama/Kontak</th>
                                    <th scope="col" class="px-6 py-3">Kendaraan</th>
                                    <th scope="col" class="px-6 py-3">Servis Terakhir</th>
                                    <th scope="col" class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($customers as $customer)
                                    @forelse($customer->vehicles as $vehicle)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4">
                                                <div class="font-bold text-gray-900 dark:text-white">{{ $customer->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $customer->whatsapp_number }}</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="uppercase tracking-tight text-red-600 font-bold text-xs">{{ $vehicle->brand }} {{ $vehicle->model }}</div>
                                                <div class="text-xs font-mono">{{ $vehicle->plate_number }}</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $vehicle->last_service_date ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex space-x-2">
                                                    <form action="{{ route('admin.send-reminder') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                                                        <button type="submit" class="p-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition" title="Kirim WA Reminder">
                                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.41 0 .01 5.403.007 12.04c0 2.12.552 4.19 1.601 6.02L0 24l6.135-1.61a11.785 11.785 0 005.91 1.586h.005c6.637 0 12.038-5.403 12.041-12.04a11.765 11.765 0 00-3.486-8.508z" /></svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4">
                                                <div class="font-bold text-gray-900 dark:text-white">{{ $customer->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $customer->whatsapp_number }}</div>
                                            </td>
                                            <td class="px-6 py-4 text-gray-400 italic" colspan="3">Belum ada kendaraan terdaftar.</td>
                                        </tr>
                                    @endforelse
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-12 text-center text-gray-500 italic">Belum ada pelanggan tercatat.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
