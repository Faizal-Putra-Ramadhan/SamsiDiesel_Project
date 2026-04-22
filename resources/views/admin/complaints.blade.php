<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Keluhan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-6">Keluhan Pelanggan</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3">Pelanggan</th>
                                    <th class="px-6 py-3">Pesan</th>
                                    <th class="px-6 py-3">Status</th>
                                    <th class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($complaints as $complaint)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 transition hover:bg-gray-50 dark:hover:bg-gray-900">
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-gray-900 dark:text-white">{{ $complaint->user->name }}</div>
                                            <div class="text-xs">{{ $complaint->user->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                            {{ $complaint->message }}
                                        </td>
                                        <td class="px-6 py-4 text-xs font-bold uppercase">
                                            <span class="px-3 py-1 rounded-full {{ $complaint->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                                {{ $complaint->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($complaint->status === 'pending')
                                                <form action="{{ route('admin.resolve-complaint', $complaint) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-green-600 font-bold hover:underline">Tandai Selesai &check;</button>
                                                </form>
                                            @else
                                                <span class="text-gray-400">Selesai</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
