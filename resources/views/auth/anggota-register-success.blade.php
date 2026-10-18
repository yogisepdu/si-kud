<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pendaftaran Berhasil - SI-KUD Kampar</title>

    @vite('resources/css/app.css')
</head>

<body class="flex min-h-screen items-center justify-center bg-gray-100 px-4">

    <div class="w-full max-w-xl rounded-3xl bg-white p-10 text-center shadow-2xl">

        <img alt="SI-KUD Kampar" class="mx-auto mb-6 w-24" src="{{ asset('assets/img/logo.jpeg') }}">

        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-yellow-100">

            <svg class="h-10 w-10 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" />
            </svg>

        </div>

        <h1 class="mt-6 text-3xl font-bold text-gray-800">
            Pendaftaran Berhasil
        </h1>

        <p class="mt-4 text-gray-600">
            Data pendaftaran Anda telah berhasil dikirim.
        </p>

        <p class="mt-2 text-gray-600">
            Akun Anda saat ini sedang
            <strong class="text-yellow-600">
                menunggu persetujuan Administrator
            </strong>.
        </p>

        <div class="mt-6 rounded-xl bg-gray-50 p-5 text-sm text-gray-600">
            Anda belum dapat login ke Dashboard Anggota sebelum
            Administrator menyetujui pendaftaran Anda.
        </div>

        <div class="mt-8">

            <a class="inline-block rounded-lg bg-green-700 px-8 py-3 font-semibold text-white hover:bg-green-800"
                href="{{ route('login') }}">
                Kembali ke Login
            </a>

        </div>

    </div>

</body>

</html>
