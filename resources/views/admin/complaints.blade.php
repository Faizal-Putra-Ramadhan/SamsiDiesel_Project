<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Keluhan') }}
        </h2>
    </x-slot>

    <div class="space-y-6">
        <div class="bg-slate-800 shadow-sm sm:rounded-lg overflow-hidden border border-slate-700">
            <div class="p-6 text-slate-100">
                <h3 class="text-xl font-bold text-white mb-6">Keluhan Pelanggan</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-300">
                        <thead class="text-xs text-slate-400 uppercase bg-slate-700/50">
                            <tr>
                                <th class="px-6 py-3">Pelanggan</th>
                                <th class="px-6 py-3">Pesan</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @foreach($complaints as $complaint)
                                <tr class="hover:bg-slate-700/30 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-white">{{ $complaint->user->name }}</div>
                                        <div class="text-xs text-slate-400">{{ $complaint->user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-300">
                                        {{ $complaint->message }}
                                    </td>
                                    <td class="px-6 py-4 text-xs font-bold uppercase">
                                        <span class="px-3 py-1 rounded-full {{ $complaint->status === 'pending' ? 'bg-yellow-500/20 text-yellow-400' : 'bg-green-500/20 text-green-400' }}">
                                            {{ $complaint->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($complaint->status === 'pending')
                                            <form action="{{ route('admin.resolve-complaint', $complaint) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-green-400 font-bold hover:text-green-300 transition-colors">Tandai Selesai</button>
                                            </form>
                                        @else
                                            <span class="text-slate-500">Selesai</span>
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
</x-admin-layout>
