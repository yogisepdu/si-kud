<x-filament-panels::page>
    <div class="mx-auto w-full max-w-4xl">

        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-gray-950 dark:text-white">
                Pendaftaran Anggota
            </h1>

            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Silakan lengkapi data untuk mengajukan pendaftaran sebagai anggota.
            </p>
        </div>

        @if (session('registration_success'))
            <div class="bg-success-50 text-success-700 mb-6 rounded-lg p-4 text-sm">
                {{ session('registration_success') }}
            </div>
        @endif

        <form wire:submit="register">

            <div class="space-y-8">

                {{-- Data Akun --}}
                <div
                    class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">

                    <h2 class="text-lg font-semibold text-gray-950 dark:text-white">
                        Data Akun
                    </h2>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Digunakan untuk login ke sistem SI-KUD.
                    </p>

                    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">

                        <div>
                            <label class="fi-fo-field-wrp-label">
                                Nama Lengkap
                            </label>

                            <input class="fi-input" placeholder="Nama lengkap" type="text" wire:model="name">

                            @error('name')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="fi-fo-field-wrp-label">
                                Email
                            </label>

                            <input class="fi-input" placeholder="email@example.com" type="email" wire:model="email">

                            @error('email')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="fi-fo-field-wrp-label">
                                Password
                            </label>

                            <input class="fi-input" placeholder="Minimal 8 karakter" type="password"
                                wire:model="password">

                            @error('password')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="fi-fo-field-wrp-label">
                                Konfirmasi Password
                            </label>

                            <input class="fi-input" placeholder="Ulangi password" type="password"
                                wire:model="password_confirmation">

                            @error('password_confirmation')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>
                </div>

                {{-- Data Anggota --}}
                <div
                    class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">

                    <h2 class="text-lg font-semibold text-gray-950 dark:text-white">
                        Data Anggota
                    </h2>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Lengkapi data pribadi dan data keanggotaan.
                    </p>

                    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">

                        <div>
                            <label class="fi-fo-field-wrp-label">
                                NIK
                            </label>

                            <input class="fi-input" maxlength="16" placeholder="16 digit NIK" type="text"
                                wire:model="nik">

                            @error('nik')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="fi-fo-field-wrp-label">
                                Tempat Lahir
                            </label>

                            <input class="fi-input" placeholder="Tempat lahir" type="text" wire:model="tempat_lahir">

                            @error('tempat_lahir')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="fi-fo-field-wrp-label">
                                Tanggal Lahir
                            </label>

                            <input class="fi-input" type="date" wire:model="tanggal_lahir">

                            @error('tanggal_lahir')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="fi-fo-field-wrp-label">
                                Jenis Kelamin
                            </label>

                            <select class="fi-input" wire:model="jenis_kelamin">
                                <option value="">Pilih jenis kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>

                            @error('jenis_kelamin')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="fi-fo-field-wrp-label">
                                Alamat
                            </label>

                            <textarea class="fi-input" placeholder="Alamat lengkap" rows="3" wire:model="alamat"></textarea>

                            @error('alamat')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="fi-fo-field-wrp-label">
                                Nomor HP
                            </label>

                            <input class="fi-input" placeholder="08xxxxxxxxxx" type="text" wire:model="no_hp">

                            @error('no_hp')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="fi-fo-field-wrp-label">
                                Jenis Petani
                            </label>

                            <select class="fi-input" wire:model="jenis_petani">
                                <option value="">Pilih jenis petani</option>
                                <option value="Plasma">Plasma</option>
                                <option value="Swadaya">Swadaya</option>
                            </select>

                            @error('jenis_petani')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="fi-fo-field-wrp-label">
                                Luas Lahan
                            </label>

                            <input class="fi-input" min="0" placeholder="Contoh: 2.50" step="0.01"
                                type="number" wire:model="luas_lahan">

                            @error('luas_lahan')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="fi-fo-field-wrp-label">
                                Blok Kebun
                            </label>

                            <input class="fi-input" placeholder="Blok kebun" type="text" wire:model="blok_kebun">

                            @error('blok_kebun')
                                <p class="text-danger-600 mt-1 text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>
                </div>

                {{-- Informasi --}}
                <div
                    class="border-warning-200 bg-warning-50 dark:border-warning-800 dark:bg-warning-950 rounded-xl border p-5">

                    <div class="flex gap-3">

                        <div class="shrink-0">
                            <x-heroicon-o-information-circle class="text-warning-600 h-6 w-6" />
                        </div>

                        <div>
                            <h3 class="text-warning-800 dark:text-warning-300 font-semibold">
                                Informasi Pendaftaran
                            </h3>

                            <p class="text-warning-700 dark:text-warning-400 mt-1 text-sm">
                                Setelah pendaftaran berhasil, akun Anda tidak langsung dapat digunakan.
                                Administrator akan melakukan pemeriksaan dan persetujuan terlebih dahulu.
                            </p>

                        </div>

                    </div>

                </div>

                {{-- Tombol --}}
                <div class="flex items-center justify-between">

                    <a class="hover:text-primary-600 text-sm font-medium text-gray-600"
                        href="{{ url('/anggota/login') }}">
                        Sudah memiliki akun? Login
                    </a>

                    <button class="fi-btn fi-btn-size-md fi-btn-color-primary" type="submit"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove>
                            Daftar Sekarang
                        </span>

                        <span wire:loading>
                            Memproses...
                        </span>
                    </button>

                </div>

            </div>

        </form>

    </div>
</x-filament-panels::page>
