<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Daftar Anggota - SI-KUD Kampar</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <div class="min-h-screen py-10">

        <div class="mx-auto w-full max-w-4xl px-4">

            {{-- HEADER --}}
            <div class="mb-6 rounded-2xl bg-green-800 p-8 text-white shadow-xl">

                <div class="flex items-center gap-5">

                    <img alt="Logo SI-KUD Kampar" class="h-20 w-20 rounded-xl object-cover"
                        src="{{ asset('assets/img/logo.jpeg') }}">

                    <div>
                        <h1 class="text-3xl font-bold">
                            Pendaftaran Anggota
                        </h1>

                        <p class="mt-1 text-green-100">
                            SI-KUD Kampar
                        </p>
                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <div class="rounded-2xl bg-white p-8 shadow-xl">

                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Form Pendaftaran
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Lengkapi data berikut untuk mengajukan pendaftaran sebagai anggota.
                    </p>
                </div>


                @if ($errors->any())
                    <div class="mb-6 rounded-lg bg-red-50 p-4 text-red-700">
                        <ul class="list-disc space-y-1 pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('anggota.register.store') }}" method="POST">
                    @csrf

                    {{-- Nama --}}
                    <div class="mb-5">
                        <label class="mb-2 block font-medium text-gray-700" for="name">
                            Nama Lengkap
                        </label>

                        <input autofocus
                            class="w-full rounded-lg border border-gray-300 p-3 focus:border-green-600 focus:ring-green-600"
                            id="name" name="name" placeholder="Masukkan nama lengkap" required type="text"
                            value="{{ old('name') }}">

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-5">
                        <label class="mb-2 block font-medium text-gray-700" for="email">
                            Email
                        </label>

                        <input
                            class="w-full rounded-lg border border-gray-300 p-3 focus:border-green-600 focus:ring-green-600"
                            id="email" name="email" placeholder="nama@email.com" required type="email"
                            value="{{ old('email') }}">

                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-5">
                        <label class="mb-2 block font-medium text-gray-700" for="password">
                            Password
                        </label>

                        <input
                            class="w-full rounded-lg border border-gray-300 p-3 focus:border-green-600 focus:ring-green-600"
                            id="password" name="password" placeholder="Minimal 8 karakter" required type="password">

                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="mb-5">
                        <label class="mb-2 block font-medium text-gray-700" for="password_confirmation">
                            Konfirmasi Password
                        </label>

                        <input
                            class="w-full rounded-lg border border-gray-300 p-3 focus:border-green-600 focus:ring-green-600"
                            id="password_confirmation" name="password_confirmation" placeholder="Ulangi password"
                            required type="password">
                    </div>

                    {{-- NIK --}}
                    <div class="mb-5">
                        <label class="mb-2 block font-medium text-gray-700" for="nik">
                            NIK
                        </label>

                        <input
                            class="w-full rounded-lg border border-gray-300 p-3 focus:border-green-600 focus:ring-green-600"
                            id="nik" inputmode="numeric" maxlength="16" name="nik"
                            placeholder="Masukkan NIK 16 digit" required type="text" value="{{ old('nik') }}">

                        @error('nik')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- No HP --}}
                    <div class="mb-5">
                        <label class="mb-2 block font-medium text-gray-700" for="no_hp">
                            No. HP
                        </label>

                        <input
                            class="w-full rounded-lg border border-gray-300 p-3 focus:border-green-600 focus:ring-green-600"
                            id="no_hp" inputmode="tel" maxlength="20" name="no_hp"
                            placeholder="Contoh: 081234567890" required type="text" value="{{ old('no_hp') }}">

                        @error('no_hp')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tempat Lahir --}}
                    <div class="mb-5">
                        <label class="mb-2 block font-medium text-gray-700" for="tempat_lahir">
                            Tempat Lahir
                        </label>

                        <input
                            class="w-full rounded-lg border border-gray-300 p-3 focus:border-green-600 focus:ring-green-600"
                            id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir" required
                            type="text" value="{{ old('tempat_lahir') }}">

                        @error('tempat_lahir')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="mb-5">
                        <label class="mb-2 block font-medium text-gray-700" for="tanggal_lahir">
                            Tanggal Lahir
                        </label>

                        <input
                            class="w-full rounded-lg border border-gray-300 p-3 focus:border-green-600 focus:ring-green-600"
                            id="tanggal_lahir" name="tanggal_lahir" required type="date"
                            value="{{ old('tanggal_lahir') }}">

                        @error('tanggal_lahir')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="mb-6">
                        <label class="mb-2 block font-medium text-gray-700" for="jenis_kelamin">
                            Jenis Kelamin
                        </label>

                        <select
                            class="w-full rounded-lg border border-gray-300 p-3 focus:border-green-600 focus:ring-green-600"
                            id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option @selected(old('jenis_kelamin') === 'Laki-laki') value="Laki-laki">
                                Laki-laki
                            </option>
                            <option @selected(old('jenis_kelamin') === 'Perempuan') value="Perempuan">
                                Perempuan
                            </option>
                        </select>

                        @error('jenis_kelamin')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        class="w-full rounded-lg bg-green-700 py-3 font-semibold text-white transition hover:bg-green-800"
                        type="submit">
                        Daftar sebagai Anggota
                    </button>

                    <div class="mt-5 text-center">
                        <a class="text-sm font-medium text-gray-600 hover:text-green-700"
                            href="{{ route('login') }}">
                            Sudah memiliki akun? Login
                        </a>
                    </div>
                </form>

            </div>

        </div>

    </div>

</body>

</html>
