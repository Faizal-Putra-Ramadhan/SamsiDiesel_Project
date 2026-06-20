<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Servis & Riwayat') }}
        </h2>
    </x-slot>

    <div class="space-y-8">
            @if(Session::has('success'))
                <div class="p-4 bg-green-500/10 border border-green-500/30 text-green-300 rounded-xl flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                    {{ Session::get('success') }}
                </div>
            @endif

            @if(Session::has('error'))
                <div class="p-4 bg-red-500/10 border border-red-500/30 text-red-300 rounded-xl flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10A8 8 0 112 10a8 8 0 0116 0zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                    {{ Session::get('error') }}
                </div>
            @endif

            <x-modal name="service-form" :show="$errors->any()" maxWidth="4xl" focusable>
            <div class="bg-slate-800 flex flex-col max-h-[88vh]">
                <div class="shrink-0 px-6 py-5 border-b border-slate-700 flex items-start justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-bold text-white flex items-center gap-2.5">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Input Servis Baru
                        </h3>
                        <p class="mt-0.5 text-sm text-slate-400">Catat pelanggan, kendaraan, rincian biaya, dan jadwal servis.</p>
                    </div>
                    <button type="button" x-on:click="$dispatch('close')" class="rounded-lg p-2 text-slate-400 hover:bg-slate-700 hover:text-white transition shrink-0" aria-label="Tutup modal">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <form action="{{ route('admin.add-service') }}" method="POST" class="flex-1 flex flex-col min-h-0"
                      x-data="{
                          serviceItems: @js(old('service_items', [['name' => '', 'price' => 0]])),
                          sparepartItems: @js(old('sparepart_items', [['name' => '', 'price' => 0]])),
                          addService() { this.serviceItems.push({ name: '', price: 0 }) },
                          removeService(index) { if(this.serviceItems.length > 1) this.serviceItems.splice(index, 1) },
                          addSparepart() { this.sparepartItems.push({ name: '', price: 0 }) },
                          removeSparepart(index) { if(this.sparepartItems.length > 1) this.sparepartItems.splice(index, 1) },
                          sum(items) { return items.reduce((acc, curr) => acc + (parseFloat(curr.price) || 0), 0) },
                          get serviceTotal() { return this.sum(this.serviceItems) },
                          get sparepartTotal() { return this.sum(this.sparepartItems) },
                          get total() { return this.serviceTotal + this.sparepartTotal }
                      }">
                    @csrf

                    <div class="flex-1 overflow-y-auto px-6 py-6 space-y-8">
                        @if($errors->any())
                        <div class="mb-6 rounded-xl border border-red-500/30 bg-red-500/10 p-4 text-sm text-red-200">
                            <div class="font-bold text-red-100">Data belum bisa disimpan.</div>
                            <ul class="mt-2 list-disc space-y-1 pl-5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <section>
                            <h4 class="text-xs font-black uppercase tracking-[0.15em] text-slate-400 mb-4 flex items-center gap-2">
                                <span class="block w-1 h-4 bg-green-500 rounded-full"></span>
                                Data Pelanggan
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="customer_name" :value="__('Nama Pelanggan')" />
                                    <x-text-input id="customer_name" name="customer_name" type="text" class="mt-1 block w-full rounded-xl" placeholder="Masukan nama..." value="{{ old('customer_name') }}" required />
                                </div>
                                <div>
                                    <x-input-label for="customer_whatsapp" :value="__('WhatsApp')" />
                                    <x-text-input id="customer_whatsapp" name="customer_whatsapp" type="text" class="mt-1 block w-full rounded-xl" placeholder="628..." value="{{ old('customer_whatsapp') }}" required />
                                </div>
                            </div>
                        </section>

                        <section>
                            <h4 class="text-xs font-black uppercase tracking-[0.15em] text-slate-400 mb-4 flex items-center gap-2">
                                <span class="block w-1 h-4 bg-green-500 rounded-full"></span>
                                Data Kendaraan
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <x-input-label for="plate_number" :value="__('Plat Nomor')" />
                                    <x-text-input id="plate_number" name="plate_number" type="text" class="mt-1 block w-full rounded-xl" placeholder="B 1234 ABC" value="{{ old('plate_number') }}" required />
                                </div>
                                <div>
                                    <x-input-label for="vehicle_brand" :value="__('Merk')" />
                                    <x-text-input id="vehicle_brand" name="vehicle_brand" type="text" class="mt-1 block w-full rounded-xl" placeholder="Toyota" value="{{ old('vehicle_brand') }}" required />
                                </div>
                                <div>
                                    <x-input-label for="vehicle_model" :value="__('Model')" />
                                    <x-text-input id="vehicle_model" name="vehicle_model" type="text" class="mt-1 block w-full rounded-xl" placeholder="Avanza" value="{{ old('vehicle_model') }}" required />
                                </div>
                            </div>
                        </section>

                        <section>
                            <h4 class="text-xs font-black uppercase tracking-[0.15em] text-slate-400 mb-4 flex items-center gap-2">
                                <span class="block w-1 h-4 bg-green-500 rounded-full"></span>
                                Rincian Biaya
                            </h4>

                            <div class="rounded-xl border border-slate-700 bg-slate-900/50 p-5 mb-4">
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <h5 class="text-sm font-bold text-white">Biaya Jasa</h5>
                                        <p class="text-xs text-slate-400 mt-0.5">Jenis pekerjaan servis dan biayanya.</p>
                                    </div>
                                    <button type="button" @click="addService()" class="text-xs font-bold bg-slate-700 hover:bg-green-600 hover:text-white text-slate-300 px-3 py-1.5 rounded-lg transition-all flex items-center">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                                        Tambah Jasa
                                    </button>
                                </div>

                                <template x-for="(service, index) in serviceItems" :key="'service-' + index">
                                    <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-end mb-3 animate-in fade-in slide-in-from-top-2 duration-300">
                                        <div class="md:col-span-7">
                                            <x-input-label class="text-[10px] uppercase text-slate-400" :value="__('Jenis Servis')" />
                                            <x-text-input x-model="service.name" x-bind:name="'service_items['+index+'][name]'" type="text" class="mt-1 block w-full rounded-xl" placeholder="Misal: Ganti Oli" required />
                                        </div>
                                        <div class="md:col-span-4">
                                            <x-input-label class="text-[10px] uppercase text-slate-400" :value="__('Biaya (Rp)')" />
                                            <x-text-input x-model="service.price" x-bind:name="'service_items['+index+'][price]'" type="number" min="0" class="mt-1 block w-full rounded-xl" placeholder="0" required />
                                        </div>
                                        <div class="md:col-span-1 text-right">
                                            <button type="button" @click="removeService(index)" class="p-2 text-slate-400 hover:text-red-500 transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>

                                <div class="text-right text-xs font-bold text-slate-400 pt-2">Subtotal Jasa: Rp <span x-text="serviceTotal.toLocaleString('id-ID')"></span></div>
                            </div>

                            <div class="rounded-xl border border-slate-700 bg-slate-900/50 p-5">
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <h5 class="text-sm font-bold text-white">Biaya Sparepart</h5>
                                        <p class="text-xs text-slate-400 mt-0.5">Sparepart yang dipakai beserta harganya.</p>
                                    </div>
                                    <button type="button" @click="addSparepart()" class="text-xs font-bold bg-slate-700 hover:bg-green-600 hover:text-white text-slate-300 px-3 py-1.5 rounded-lg transition-all flex items-center">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                                        Tambah Sparepart
                                    </button>
                                </div>

                                <template x-for="(sparepart, index) in sparepartItems" :key="'sparepart-' + index">
                                    <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-end mb-3 animate-in fade-in slide-in-from-top-2 duration-300">
                                        <div class="md:col-span-7">
                                            <x-input-label class="text-[10px] uppercase text-slate-400" :value="__('Nama Sparepart')" />
                                            <x-text-input x-model="sparepart.name" x-bind:name="'sparepart_items['+index+'][name]'" type="text" class="mt-1 block w-full rounded-xl" placeholder="Misal: Oli Shell 4L" />
                                        </div>
                                        <div class="md:col-span-4">
                                            <x-input-label class="text-[10px] uppercase text-slate-400" :value="__('Harga (Rp)')" />
                                            <x-text-input x-model="sparepart.price" x-bind:name="'sparepart_items['+index+'][price]'" type="number" min="0" class="mt-1 block w-full rounded-xl" placeholder="0" />
                                        </div>
                                        <div class="md:col-span-1 text-right">
                                            <button type="button" @click="removeSparepart(index)" class="p-2 text-slate-400 hover:text-red-500 transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>

                                <div class="text-right text-xs font-bold text-slate-400 pt-2">Subtotal Sparepart: Rp <span x-text="sparepartTotal.toLocaleString('id-ID')"></span></div>
                            </div>
                        </section>

                        <section>
                            <h4 class="text-xs font-black uppercase tracking-[0.15em] text-slate-400 mb-4 flex items-center gap-2">
                                <span class="block w-1 h-4 bg-green-500 rounded-full"></span>
                                Jadwal &amp; Catatan
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <x-input-label for="service_date" :value="__('Tanggal Servis')" />
                                    <x-text-input id="service_date" name="service_date" type="date" value="{{ old('service_date', date('Y-m-d')) }}" class="mt-1 block w-full rounded-xl" required />
                                </div>
                                <div>
                                    <x-input-label for="technician_name" :value="__('Nama Teknisi')" />
                                    <x-text-input id="technician_name" name="technician_name" type="text" class="mt-1 block w-full rounded-xl" placeholder="Nama Montir" value="{{ old('technician_name') }}" />
                                </div>
                                <div>
                                    <x-input-label for="next_service_date" :value="__('Servis Berikutnya')" />
                                    <x-text-input id="next_service_date" name="next_service_date" type="date" class="mt-1 block w-full rounded-xl" value="{{ old('next_service_date') }}" />
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="notes" :value="__('Catatan Tambahan')" />
                                <textarea id="notes" name="notes" class="mt-1 block w-full border-slate-600 bg-slate-900 text-slate-200 placeholder-slate-500 focus:border-green-500 focus:ring-green-500 rounded-xl shadow-sm" rows="2" placeholder="Opsional...">{{ old('notes') }}</textarea>
                            </div>
                        </section>
                    </div>

                    <div class="shrink-0 px-6 py-4 border-t border-slate-700 bg-slate-800/95 backdrop-blur-sm">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <div class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-0.5">Total Tagihan</div>
                                <div class="text-xl font-black text-green-400">Rp <span x-text="total.toLocaleString('id-ID')"></span></div>
                            </div>
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-green-500/20 active:scale-[0.98]">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                Simpan Data Servis
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            </x-modal>

            <!-- Recent Histories -->
            <div class="bg-slate-800 shadow-sm sm:rounded-lg overflow-hidden border border-slate-700">
                <div class="p-6 text-white bg-slate-700/50 border-b border-slate-700">
                    <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
                        <div>
                            <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">Daftar servis</p>
                            <h3 class="mt-1 text-xl font-bold">Monitor Progres Servis</h3>
                            <p class="mt-1 text-sm text-slate-400">Pantau servis yang sudah masuk dan cari cepat berdasarkan plat nomor.</p>
                        </div>

                        <div class="flex flex-col gap-3 lg:min-w-[560px]">
                            <form action="{{ route('admin.services') }}" method="GET" class="flex flex-col gap-2 sm:flex-row">
                                <div class="relative flex-1">
                                    <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35m1.85-5.65a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0Z" /></svg>
                                    <input type="search" name="q" value="{{ $search }}" placeholder="Cari plat nomor, misal B 1234 ABC" class="w-full rounded-xl border-slate-600 bg-slate-900 py-2.5 pl-10 pr-4 text-sm text-slate-100 placeholder-slate-500 focus:border-red-500 focus:ring-red-500">
                                </div>
                                <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-bold text-slate-100 transition hover:bg-slate-950 active:scale-[0.98]">
                                    Cari
                                </button>
                                @if($search)
                                    <a href="{{ route('admin.services') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-600 px-4 py-2.5 text-sm font-bold text-slate-300 transition hover:bg-slate-800">
                                        Reset
                                    </a>
                                @endif
                            </form>

                            <div class="flex flex-col gap-2 sm:flex-row sm:justify-end">
                                <button type="button" x-data x-on:click="$dispatch('open-modal', 'service-form')" class="inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-bold rounded-xl transition shadow-lg shadow-green-500/20 active:scale-[0.98]">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                                    Tambah Servis
                                </button>
                                <a href="{{ route('admin.export-excel') }}" class="inline-flex items-center justify-center px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-bold rounded-xl transition shadow-lg shadow-amber-500/20">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                    Ekspor Excel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-400 uppercase bg-slate-700/50">
                            <tr>
                                <th class="px-6 py-4">Status & Tanggal</th>
                                <th class="px-6 py-4">Pelanggan/Kendaraan</th>
                                <th class="px-6 py-4">Servis & Part</th>
                                <th class="px-6 py-4">Tagihan</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @forelse($histories as $history)
                                <tr class="hover:bg-slate-700/30 transition-colors">
                                    <td class="px-6 py-4">
                                        @php
                                            $statusClasses = match($history->status) {
                                                'masuk' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                                                'pengerjaan' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400',
                                                'selesai' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                                                default => 'bg-gray-100 text-gray-700 dark:bg-gray-900/30 dark:text-gray-400',
                                            };
                                            $statusNames = [
                                                'masuk' => 'MASUK',
                                                'pengerjaan' => 'PENGERJAAN',
                                                'selesai' => 'SELESAI',
                                            ];
                                            $currentStatusName = $statusNames[$history->status] ?? 'UNKNOWN';
                                        @endphp
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-black tracking-widest {{ $statusClasses }} mb-2 inline-block">
                                            {{ $currentStatusName }}
                                        </span>
                                        <div class="text-xs font-bold text-slate-400">{{ \Carbon\Carbon::parse($history->service_date)->format('d/m/Y') }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-black text-white uppercase">{{ $history->vehicle->user->name }}</div>
                                        <div class="text-xs text-red-600 font-bold">{{ $history->vehicle->plate_number }}</div>
                                        <div class="text-[10px] text-slate-400 uppercase tracking-widest">{{ $history->vehicle->brand }} {{ $history->vehicle->model }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $serviceDetails = $history->details->where('type', 'jasa');
                                            $sparepartDetails = $history->details->where('type', 'sparepart');
                                        @endphp
                                        <div class="font-bold text-white">{{ $history->service_type }}</div>
                                        @if($serviceDetails->isNotEmpty())
                                            <div class="mt-1 space-y-0.5">
                                                @foreach($serviceDetails as $detail)
                                                    <div class="text-[11px] text-slate-400">Jasa: {{ $detail->name }} - Rp {{ number_format($detail->price, 0, ',', '.') }}</div>
                                                @endforeach
                                            </div>
                                        @endif
                                        @if($sparepartDetails->isNotEmpty())
                                            <div class="mt-2 flex flex-wrap gap-1">
                                                @foreach($sparepartDetails as $part)
                                                    <span class="px-1.5 py-0.5 bg-slate-700 rounded text-[10px] text-slate-300">{{ $part->name }} - Rp {{ number_format($part->price, 0, ',', '.') }}</span>
                                                @endforeach
                                            </div>
                                        @elseif($history->spareparts)
                                            <div class="mt-2 flex flex-wrap gap-1">
                                                @foreach(explode(',', $history->spareparts) as $part)
                                                    <span class="px-1.5 py-0.5 bg-slate-700 rounded text-[10px] text-slate-300">{{ trim($part) }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-black text-white">Rp {{ number_format($history->total_cost, 0, ',', '.') }}</div>
                                        @if($history->invoice_status == 'lunas')
                                            <span class="text-[10px] font-bold text-green-600 uppercase">● LUNAS</span>
                                        @else
                                            <span class="text-[10px] font-bold text-orange-500 uppercase">○ BELUM LUNAS</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <!-- Action: WhatsApp -->
                                            @if($history->status == 'pengerjaan')
                                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $history->vehicle->user->whatsapp_number) }}?text=Halo%20{{ urlencode($history->vehicle->user->name) }},%20kami%20sedang%20mengerjakan%20kendaraan%20Anda%20({{ urlencode($history->vehicle->plate_number) }})." 
                                                   target="_blank"
                                                   class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition" title="Lanjut Chat WA">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                                </a>
                                            @endif

                                            <!-- Form Status Change -->
                                            <form action="{{ route('admin.update-service', $history) }}" method="POST" class="inline">
                                                @csrf @method('PATCH')
                                                @if($history->status == 'masuk')
                                                    <input type="hidden" name="status" value="pengerjaan">
                                                    <button type="submit" class="p-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition" title="Mulai Pengerjaan">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                    </button>
                                                @elseif($history->status == 'pengerjaan')
                                                    <input type="hidden" name="status" value="selesai">
                                                    <button type="submit" class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition" title="Selesaikan Servis">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                                    </button>
                                                @endif
                                            </form>



                                            <!-- Action: Confirm Payment -->
                                            @if($history->invoice_status == 'pending')
                                                <form action="{{ route('admin.confirm-payment', $history) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="p-2 text-gray-400 hover:text-green-600 hover:bg-green-50 rounded-lg transition" title="Konfirmasi Lunas">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                    </button>
                                                </form>
                                            @endif

                                            <!-- Action: Edit Rincian -->
                                            <button type="button" x-data x-on:click="$dispatch('open-modal', 'edit-details-{{ $history->id }}')" class="p-2 text-amber-400 hover:bg-amber-400/10 rounded-lg transition" title="Edit Rincian Biaya">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                            </button>

                                            <!-- Action: Download Invoice -->
                                            <a href="{{ route('admin.download-invoice', $history) }}" 
                                               class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" 
                                               title="Cetak Invoice PDF"
                                               target="_blank">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-14 text-center">
                                        <div class="mx-auto max-w-md">
                                            <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-700 text-slate-400">
                                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.75 9.75h.008v.008H9.75V9.75Zm4.5 0h.008v.008h-.008V9.75ZM9 15h6m-9 6h12a2 2 0 0 0 2-2V7.5L14.5 2H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2Z" /></svg>
                                            </div>
                                            @if($search)
                                                <h4 class="text-base font-bold text-white">Plat nomor tidak ditemukan</h4>
                                                <p class="mt-1 text-sm text-slate-400">Tidak ada data servis dengan keyword "{{ $search }}".</p>
                                                <a href="{{ route('admin.services') }}" class="mt-4 inline-flex items-center justify-center rounded-xl bg-slate-700 px-4 py-2 text-sm font-bold text-slate-200 transition hover:bg-slate-600">Tampilkan semua data</a>
                                            @else
                                                <h4 class="text-base font-bold text-white">Belum ada data servis</h4>
                                                <p class="mt-1 text-sm text-slate-400">Klik Tambah Servis untuk mencatat servis pertama.</p>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

    @foreach($histories as $history)
        @php
            $jasaInit = $history->details->where('type', 'jasa')->map(fn($d) => ['name' => $d->name, 'price' => (float) $d->price])->values();
            $partInit = $history->details->where('type', 'sparepart')->map(fn($d) => ['name' => $d->name, 'price' => (float) $d->price])->values();
        @endphp
        <x-modal name="edit-details-{{ $history->id }}" :show="$errors->any() && old('_history_id') == $history->id" maxWidth="3xl" focusable>
        <div class="bg-slate-800 flex flex-col max-h-[88vh]">
            <div class="shrink-0 px-6 py-5 border-b border-slate-700 flex items-start justify-between gap-4">
                <div>
                    <h3 class="text-lg font-bold text-white flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        Edit Rincian Biaya
                    </h3>
                    <p class="mt-0.5 text-sm text-slate-400">#INV-{{ str_pad($history->id, 5, '0', STR_PAD_LEFT) }} &mdash; {{ \Carbon\Carbon::parse($history->service_date)->format('d M Y') }}</p>
                </div>
                <button type="button" x-on:click="$dispatch('close')" class="rounded-lg p-2 text-slate-400 hover:bg-slate-700 hover:text-white transition shrink-0" aria-label="Tutup modal">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <form action="{{ route('admin.update-service-details', $history) }}" method="POST" class="flex-1 flex flex-col min-h-0"
                  x-data="{
                      serviceItems: @js(old('service_items', $jasaInit->isEmpty() ? [['name' => '', 'price' => 0]] : $jasaInit->toArray())),
                      sparepartItems: @js(old('sparepart_items', $partInit->isEmpty() ? [['name' => '', 'price' => 0]] : $partInit->toArray())),
                      addService() { this.serviceItems.push({ name: '', price: 0 }) },
                      removeService(index) { if(this.serviceItems.length > 1) this.serviceItems.splice(index, 1) },
                      addSparepart() { this.sparepartItems.push({ name: '', price: 0 }) },
                      removeSparepart(index) { if(this.sparepartItems.length > 1) this.sparepartItems.splice(index, 1) },
                      sum(items) { return items.reduce((acc, curr) => acc + (parseFloat(curr.price) || 0), 0) },
                      get serviceTotal() { return this.sum(this.serviceItems) },
                      get sparepartTotal() { return this.sum(this.sparepartItems) },
                      get total() { return this.serviceTotal + this.sparepartTotal }
                  }">
                @csrf @method('PATCH')
                <input type="hidden" name="_history_id" value="{{ $history->id }}">

                <div class="flex-1 overflow-y-auto px-6 py-6 space-y-8">
                    @if($errors->any() && old('_history_id') == $history->id)
                        <div class="rounded-xl border border-red-500/30 bg-red-500/10 p-4 text-sm text-red-200">
                            <div class="font-bold text-red-100">Data belum bisa disimpan.</div>
                            <ul class="mt-2 list-disc space-y-1 pl-5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="rounded-xl border border-slate-700 bg-slate-900/30 p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                            <div><span class="text-slate-500">Pelanggan:</span> <span class="text-white font-bold ml-1">{{ $history->vehicle->user->name }}</span></div>
                            <div><span class="text-slate-500">WhatsApp:</span> <span class="text-slate-300 ml-1">{{ $history->vehicle->user->whatsapp_number }}</span></div>
                            <div><span class="text-slate-500">Plat Nomor:</span> <span class="text-white font-bold ml-1">{{ $history->vehicle->plate_number }}</span></div>
                            <div><span class="text-slate-500">Kendaraan:</span> <span class="text-slate-300 ml-1">{{ $history->vehicle->brand }} {{ $history->vehicle->model }}</span></div>
                        </div>
                    </div>

                    <section>
                        <h4 class="text-xs font-black uppercase tracking-[0.15em] text-slate-400 mb-4 flex items-center gap-2">
                            <span class="block w-1 h-4 bg-amber-500 rounded-full"></span>
                            Rincian Biaya
                        </h4>

                        <div class="rounded-xl border border-slate-700 bg-slate-900/50 p-5 mb-4">
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <h5 class="text-sm font-bold text-white">Biaya Jasa</h5>
                                    <p class="text-xs text-slate-400 mt-0.5">Jenis pekerjaan servis dan biayanya.</p>
                                </div>
                                <button type="button" @click="addService()" class="text-xs font-bold bg-slate-700 hover:bg-green-600 hover:text-white text-slate-300 px-3 py-1.5 rounded-lg transition-all flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                                    Tambah Jasa
                                </button>
                            </div>

                            <template x-for="(service, index) in serviceItems" :key="'service-' + index">
                                <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-end mb-3 animate-in fade-in slide-in-from-top-2 duration-300">
                                    <div class="md:col-span-7">
                                        <x-input-label class="text-[10px] uppercase text-slate-400" :value="__('Jenis Servis')" />
                                        <x-text-input x-model="service.name" x-bind:name="'service_items['+index+'][name]'" type="text" class="mt-1 block w-full rounded-xl" placeholder="Misal: Ganti Oli" required />
                                    </div>
                                    <div class="md:col-span-4">
                                        <x-input-label class="text-[10px] uppercase text-slate-400" :value="__('Biaya (Rp)')" />
                                        <x-text-input x-model="service.price" x-bind:name="'service_items['+index+'][price]'" type="number" min="0" class="mt-1 block w-full rounded-xl" placeholder="0" required />
                                    </div>
                                    <div class="md:col-span-1 text-right">
                                        <button type="button" @click="removeService(index)" class="p-2 text-slate-400 hover:text-red-500 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    </div>
                                </div>
                            </template>

                            <div class="text-right text-xs font-bold text-slate-400 pt-2">Subtotal Jasa: Rp <span x-text="serviceTotal.toLocaleString('id-ID')"></span></div>
                        </div>

                        <div class="rounded-xl border border-slate-700 bg-slate-900/50 p-5">
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <h5 class="text-sm font-bold text-white">Biaya Sparepart</h5>
                                    <p class="text-xs text-slate-400 mt-0.5">Sparepart yang dipakai beserta harganya.</p>
                                </div>
                                <button type="button" @click="addSparepart()" class="text-xs font-bold bg-slate-700 hover:bg-green-600 hover:text-white text-slate-300 px-3 py-1.5 rounded-lg transition-all flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                                    Tambah Sparepart
                                </button>
                            </div>

                            <template x-for="(sparepart, index) in sparepartItems" :key="'sparepart-' + index">
                                <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-end mb-3 animate-in fade-in slide-in-from-top-2 duration-300">
                                    <div class="md:col-span-7">
                                        <x-input-label class="text-[10px] uppercase text-slate-400" :value="__('Nama Sparepart')" />
                                        <x-text-input x-model="sparepart.name" x-bind:name="'sparepart_items['+index+'][name]'" type="text" class="mt-1 block w-full rounded-xl" placeholder="Misal: Oli Shell 4L" />
                                    </div>
                                    <div class="md:col-span-4">
                                        <x-input-label class="text-[10px] uppercase text-slate-400" :value="__('Harga (Rp)')" />
                                        <x-text-input x-model="sparepart.price" x-bind:name="'sparepart_items['+index+'][price]'" type="number" min="0" class="mt-1 block w-full rounded-xl" placeholder="0" />
                                    </div>
                                    <div class="md:col-span-1 text-right">
                                        <button type="button" @click="removeSparepart(index)" class="p-2 text-slate-400 hover:text-red-500 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    </div>
                                </div>
                            </template>

                            <div class="text-right text-xs font-bold text-slate-400 pt-2">Subtotal Sparepart: Rp <span x-text="sparepartTotal.toLocaleString('id-ID')"></span></div>
                        </div>
                    </section>
                </div>

                <div class="shrink-0 px-6 py-4 border-t border-slate-700 bg-slate-800/95 backdrop-blur-sm">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <div class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-0.5">Total Tagihan Baru</div>
                            <div class="text-xl font-black text-green-400">Rp <span x-text="total.toLocaleString('id-ID')"></span></div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-xl transition-all shadow-lg shadow-amber-500/20 active:scale-[0.98]">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </x-modal>
    @endforeach

    @if(session('whatsapp_open'))
        <script>
            window.open("{{ session('whatsapp_open') }}", "_blank");
        </script>
    @endif
</x-admin-layout>
