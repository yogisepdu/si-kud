<x-filament-panels::page>
    <div class="mx-auto w-full max-w-2xl">

        <div
            class="rounded-xl bg-white p-8 text-center shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">

            <div
                class="bg-warning-100 dark:bg-warning-950 mx-auto flex h-20 w-20 items-center justify-center rounded-full">
                <x-heroicon-o-clock class="text-warning-600 h-10 w-10" />
            </div>

            <h1 class="mt-6 text-2xl font-bold text-gray-950 dark:text-white">
                Pendaftaran Berhasil
            </h1>

            <p class="mt-4 text-gray-600 dark:text-gray-400">
                Data pendaftaran Anda telah berhasil dikirim.
            </p>

            <p class="mt-2 text-gray-600 dark:text-gray-400">
                Saat ini akun Anda sedang
                <strong class="text-warning-600">
                    menunggu persetujuan Administrator
                </strong>.
            </p>

            <div class="mt-6 rounded-lg bg-gray-50 p-4 text-sm text-gray-600 dark:bg-gray-800 dark:text-gray-400">
                Anda belum dapat mengakses Dashboard Anggota sampai
                Administrator menyetujui pendaftaran Anda.
            </div>

            <div class="mt-8">
                <a class="fi-btn fi-btn-size-md fi-btn-color-primary" href="{{ url('/anggota/login') }}">
                    Kembali ke Login
                </a>
            </div>

        </div>

    </div>
</x-filament-panels::page>
