<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SI-KUD Kampar</title>

    @vite('resources/css/app.css')
</head>

<body>

    <div class="flex min-h-screen">

        {{-- KIRI --}}
        <div class="relative hidden bg-cover bg-center lg:flex lg:w-1/2"
            style="background-image:url('{{ asset('assets/login/bg.png') }}')">

            <div class="absolute inset-0 bg-green-900/60"></div>

            <div class="relative z-10 flex flex-col justify-center px-16 text-white">

                <img class="mb-6 w-28" src="{{ asset('assets/img/logo.jpeg') }}">

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

                    <img class="mx-auto mb-4 w-24" src="{{ asset('assets/img/logo.jpeg') }}">

                    <h2 class="text-4xl font-bold">
                        Selamat Datang
                    </h2>

                    <p class="text-gray-500">
                        Silakan masuk untuk melanjutkan
                    </p>

                </div>

                <form action="/login" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="mb-2 block font-medium">
                            Email
                        </label>

                        <input class="w-full rounded-lg border p-3" name="email" required type="email">
                    </div>

                    <div class="mb-4">
                        <label class="mb-2 block font-medium">
                            Password
                        </label>

                        <input class="w-full rounded-lg border p-3" name="password" required type="password">
                    </div>

                    <div class="mb-6">
                        <label class="flex items-center gap-2">
                            <input name="remember" type="checkbox">
                            Ingat Saya
                        </label>
                    </div>

                    @error('email')
                        <div class="mb-4 text-red-600">
                            {{ $message }}
                        </div>
                    @enderror

                    <button class="w-full rounded-lg bg-amber-600 py-3 text-white" type="submit">
                        Login
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
