@php
    $file = $getState();
@endphp

@if ($file)
    <div class="space-y-4">

        <iframe class="w-full rounded-xl border" height="700" src="{{ asset('storage/' . $file) }}" width="100%">
        </iframe>

        <a class="bg-primary-600 inline-flex items-center rounded-lg px-4 py-2 text-white"
            href="{{ asset('storage/' . $file) }}" target="_blank">
            Buka PDF Full
        </a>

    </div>
@else
    <div class="text-gray-500">
        Dokumen tidak tersedia
    </div>
@endif
