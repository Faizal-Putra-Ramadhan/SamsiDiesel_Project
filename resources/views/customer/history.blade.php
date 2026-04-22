<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Riwayat Servis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-6">Catatan Perawatan Berkala</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Tanggal</th>
                                    <th scope="col" class="px-6 py-3">Kendaraan</th>
                                    <th scope="col" class="px-6 py-3">Jenis Servis</th>
                                    <th scope="col" class="px-6 py-3">Teknisi</th>
                                    <th scope="col" class="px-6 py-3">Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($histories as $history)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $history->service_date }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $history->vehicle->brand }} {{ $history->vehicle->model }} ({{ $history->vehicle->plate_number }})
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 bg-red-600/10 text-red-600 rounded-md font-bold">{{ $history->service_type }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $history->technician_name ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $history->notes ?? '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center text-gray-500 italic">Belum ada riwayat servis tercatat.</td>
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
