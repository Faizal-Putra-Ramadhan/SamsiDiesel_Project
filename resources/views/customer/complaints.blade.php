<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Keluhan & Masukan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Complaint Form -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-6">Kirim Keluhan Baru</h3>
                    
                    @if(Session::has('success'))
                        <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <form action="{{ route('customer.store-complaint') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="message" :value="__('Isi Keluhan / Feedback')" />
                            <textarea id="message" name="message" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-600 focus:ring-red-600 rounded-md shadow-sm" rows="4" placeholder="Ceritakan keluhan Anda..." required></textarea>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        </div>
                        <x-primary-button class="bg-red-600 hover:bg-red-700">Kirim Keluhan</x-primary-button>
                    </form>
                </div>
            </div>

            <!-- List of Complaints -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-6">Riwayat Keluhan</h3>
                    
                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($complaints as $complaint)
                            <div class="py-6">
                                <div class="flex justify-between items-start">
                                    <p class="text-gray-700 dark:text-gray-300">{{ $complaint->message }}</p>
                                    <span class="px-3 py-1 text-xs font-bold uppercase rounded-full {{ $complaint->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $complaint->status }}
                                    </span>
                                </div>
                                <p class="mt-2 text-xs text-gray-500">{{ $complaint->created_at->diffForHumans() }}</p>
                            </div>
                        @empty
                            <p class="py-12 text-center text-gray-500 italic">Belum ada keluhan yang dikirim.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
