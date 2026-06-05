<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SI-KUD Kampar</title>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen">

    <div class="flex min-h-screen">

        {{-- KIRI --}}
        <div
            class="relative hidden bg-cover bg-center lg:flex lg:w-1/2"
            style="background-image:url('{{ asset('assets/login/bg.png') }}')"
        >

            <div class="absolute inset-0 bg-green-900/60"></div>

            <div class="relative z-10 flex flex-col justify-center px-16 text-white">

                <img
                    src="{{ asset('assets/img/logo.jpeg') }}"
                    class="mb-6 w-28"
                >

                <h1 class="text-6xl font-bold">
                    SI-KUD KAMPAR
                </h1>

                <p class="mt-3 text-2xl">
                    Sistem Informasi Koperasi Unit Desa
                </p>

                <div class="my-8 h-1 w-24 bg-yellow-400"></div>

                <p class="max-w-lg text-lg">
                    Mewujudkan Koperasi yang Mandiri,
                    Profesional dan Berdaya Saing
                    untuk Kesejahteraan Anggota.
                </p>

            </div>

        </div>

        {{-- KANAN --}}
        <div class="flex w-full items-center justify-center bg-gray-100 lg:w-1/2">

            <div class="w-full max-w-xl rounded-3xl bg-white p-12 shadow-2xl">

                <div class="mb-8 text-center">

                    <img
                        src="{{ asset('assets/img/logo.jpeg') }}"
                        class="mx-auto mb-4 w-24"
                    >

                    <h2 class="text-4xl font-bold">
                        Selamat Datang
                    </h2>

                    <p class="text-gray-500">
                        Silakan masuk untuk melanjutkan
                    </p>

                </div>

                <form wire:submit="authenticate">
                    {{ $this->form }}

                    <x-filament::button
                        type="submit"
                        size="lg"
                        class="mt-6 w-full"
                    >
                        Loginc
                    </x-filament::button>
                </form>

                <div class="mt-10 text-center">

                    <h3 class="font-bold text-green-700">
                        SI-KUD Kampar
                    </h3>

                    <p class="text-gray-500">
                        Sistem Informasi Koperasi Unit Desa
                    </p>

                </div>

            </div>

        </div>

    </div>

    @filamentScripts

</body>

</html>
