{{-- resources/views/filament/modals/bukti-pembayaran.blade.php --}}

@php
    $url = asset('storage/' . $file);
    $extension = pathinfo($file, PATHINFO_EXTENSION);
@endphp

@if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'webp']))
    <img class="w-full rounded-lg" src="{{ $url }}">
@elseif(strtolower($extension) === 'pdf')
    <iframe height="700" src="{{ $url }}" width="100%"></iframe>
@endif
