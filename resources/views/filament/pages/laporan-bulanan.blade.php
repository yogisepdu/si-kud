<x-filament-panels::page>

    @php
        $summary = $this->getSummary();
    @endphp

    <div
        class="overflow-hidden rounded-2xl bg-gradient-to-r from-amber-500 via-orange-500 to-red-500 p-8 text-white shadow-xl">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm uppercase tracking-widest text-white/80">
                    Sistem Informasi Koperasi
                </p>

                <h1 class="mt-2 text-4xl font-bold">
                    Laporan Bulanan
                </h1>

                <p class="mt-2 text-lg text-white/90">
                    Koperasi Serba Usaha
                </p>

            </div>

            <div class="text-right">

                <div class="text-sm text-white/80">
                    Periode
                </div>

                <div class="text-2xl font-bold">
                    {{ \Carbon\Carbon::create($this->tahun, $this->bulan, 1)->translatedFormat('F Y') }}
                </div>

            </div>

        </div>

    </div>

    {{-- ================= FILTER ================= --}}
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-900">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 dark:bg-amber-500/20">

                <x-heroicon-o-funnel class="h-5 w-5 text-amber-600" />

            </div>

            <div>

                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Filter Laporan
                </h2>

                <p class="text-sm text-gray-500">
                    Pilih periode laporan yang ingin ditampilkan.
                </p>

            </div>

        </div>

        <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">

            {{-- Bulan --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-600 dark:text-gray-300">
                    Bulan
                </label>

                <select
                    wire:model.live="bulan"
                    class="block w-full rounded-xl border-gray-300 bg-white shadow-sm transition focus:border-amber-500 focus:ring-amber-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                >

                    @foreach (range(1, 12) as $b)
                        <option value="{{ $b }}">
                            {{ \Carbon\Carbon::create()->month($b)->translatedFormat('F') }}
                        </option>
                    @endforeach

                </select>

            </div>

            {{-- Tahun --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-600 dark:text-gray-300">
                    Tahun
                </label>

                <select
                    wire:model.live="tahun"
                    class="block w-full rounded-xl border-gray-300 bg-white shadow-sm transition focus:border-amber-500 focus:ring-amber-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                >

                    @foreach (range(now()->year - 5, now()->year + 5) as $t)
                        <option value="{{ $t }}">
                            {{ $t }}
                        </option>
                    @endforeach

                </select>

            </div>

            {{-- Informasi --}}
            <div class="flex items-end">

                <div class="w-full rounded-xl bg-amber-50 px-4 py-3 dark:bg-amber-500/10">

                    <div class="text-xs uppercase tracking-wide text-amber-600">
                        Periode Aktif
                    </div>

                    <div class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                        {{ \Carbon\Carbon::create($this->tahun, $this->bulan, 1)->translatedFormat('F Y') }}
                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- ================= HEADER ================= --}}
    <div class="mt-6 rounded-xl border border-gray-200 bg-white p-8 shadow-sm dark:border-gray-700 dark:bg-gray-900">

        <div class="text-center">

            <h1 class="text-3xl font-bold">

                KOPERASI SERBA USAHA

            </h1>

            <p class="mt-2 text-lg">

                LAPORAN BULANAN

            </p>

            <p class="mt-1 text-sm text-gray-500">

                {{ \Carbon\Carbon::create($tahun, $bulan, 1)->translatedFormat('F Y') }}

            </p>

        </div>

    </div>

    {{-- ================= STATISTIK ================= --}}
    <div class="mt-6 grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-5">

        <div class="rounded-xl border bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-900">

            <div class="text-sm text-gray-500">

                Jumlah Anggota

            </div>

            <div class="mt-2 text-3xl font-bold">

                {{ number_format($summary['anggota']) }}

            </div>

        </div>

        <div class="rounded-xl border bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-900">

            <div class="text-sm text-gray-500">

                Total Simpanan

            </div>

            <div class="text-success-600 mt-2 text-2xl font-bold">

                Rp {{ number_format($summary['simpanan'], 0, ',', '.') }}

            </div>

        </div>

        <div class="rounded-xl border bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-900">

            <div class="text-sm text-gray-500">

                Total Pinjaman

            </div>

            <div class="text-warning-600 mt-2 text-2xl font-bold">

                Rp {{ number_format($summary['pinjaman'], 0, ',', '.') }}

            </div>

        </div>

        <div class="rounded-xl border bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-900">

            <div class="text-sm text-gray-500">

                Total Angsuran

            </div>

            <div class="text-info-600 mt-2 text-2xl font-bold">

                Rp {{ number_format($summary['angsuran'], 0, ',', '.') }}

            </div>

        </div>

        <div class="rounded-xl border bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-900">

            <div class="text-sm text-gray-500">

                Sisa Pinjaman

            </div>

            <div class="text-danger-600 mt-2 text-2xl font-bold">

                Rp {{ number_format($summary['sisa'], 0, ',', '.') }}

            </div>

        </div>

    </div>

    {{-- ================= TABEL ================= --}}
    <div
        class="mt-8 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                <thead class="bg-gray-50 dark:bg-gray-800">

                    <tr>

                        <th class="px-4 py-3 text-left text-sm font-semibold">No</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">No Anggota</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Nama</th>
                        <th class="px-4 py-3 text-right text-sm font-semibold">Simpanan</th>
                        <th class="px-4 py-3 text-right text-sm font-semibold">Pinjaman</th>
                        <th class="px-4 py-3 text-right text-sm font-semibold">Angsuran</th>
                        <th class="px-4 py-3 text-right text-sm font-semibold">Sisa</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                    @forelse($this->getLaporan() as $row)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">

                            <td class="px-4 py-3">

                                {{ $loop->iteration }}

                            </td>

                            <td class="px-4 py-3">

                                {{ $row->kode }}

                            </td>

                            <td class="px-4 py-3">

                                {{ $row->nama }}

                            </td>

                            <td class="px-4 py-3 text-right">

                                {{ number_format($row->total_simpanan, 0, ',', '.') }}

                            </td>

                            <td class="px-4 py-3 text-right">

                                {{ number_format($row->total_pinjaman, 0, ',', '.') }}

                            </td>

                            <td class="px-4 py-3 text-right">

                                {{ number_format($row->total_angsuran, 0, ',', '.') }}

                            </td>

                            <td class="px-4 py-3 text-right font-semibold">

                                {{ number_format($row->sisa_pinjaman, 0, ',', '.') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="px-4 py-8 text-center text-gray-500"
                            >

                                Tidak ada data untuk periode ini.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-filament-panels::page>
