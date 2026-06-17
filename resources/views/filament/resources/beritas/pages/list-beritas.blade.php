<x-filament-panels::page>

    <div
        style="
            background:white;
            border:1px solid #e5e7eb;
            border-radius:12px;
            overflow:hidden;
        ">

        {{-- Toolbar --}}
        <div
            style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                padding:20px 24px;
                border-bottom:1px solid #e5e7eb;
            ">

            <div style="display:flex;gap:30px;align-items:center;">

                <button
                    style="
            background:none;
            border:none;
            cursor:pointer;
            padding:0 0 10px;
            font-weight:600;
            text-decoration:none;
            color:{{ $status === 'all' ? '#f97316' : '#6b7280' }};
            border-bottom:3px solid {{ $status === 'all' ? '#f97316' : 'transparent' }};
        "
                    wire:click="setStatus('all')">
                    Semua ({{ \App\Models\Berita::count() }})
                </button>

                <button
                    style="
                        background:none;
                        border:none;
                        cursor:pointer;
                        padding:0 0 10px;
                        font-weight:600;
                        color:{{ $status === 'popular' ? '#f97316' : '#6b7280' }};
                        border-bottom:3px solid {{ $status === 'popular' ? '#f97316' : 'transparent' }};
                    "
                    wire:click="setStatus('popular')">

                    Terpopuler
                </button>

                @if (auth()->user()?->isAdmin())
                    <button
                        style="
                background:none;
                border:none;
                cursor:pointer;
                padding:0 0 10px;
                font-weight:600;
                color:{{ $status === 'published' ? '#f97316' : '#6b7280' }};
                border-bottom:3px solid {{ $status === 'published' ? '#f97316' : 'transparent' }};
            "
                        wire:click="setStatus('published')">
                        Published ({{ \App\Models\Berita::where('is_publish', true)->count() }})
                    </button>

                    <button
                        style="
                            background:none;
                            border:none;
                            cursor:pointer;
                            padding:0 0 10px;
                            font-weight:600;
                            color:{{ $status === 'draft' ? '#f97316' : '#6b7280' }};
                            border-bottom:3px solid {{ $status === 'draft' ? '#f97316' : 'transparent' }};
                        "
                        wire:click="setStatus('draft')">
                        Draft ({{ \App\Models\Berita::where('is_publish', false)->count() }})
                    </button>
                @endif

            </div>

            <input placeholder="Cari berita..."
                style="
                    width:280px;
                    padding:10px 15px;
                    border:1px solid #d1d5db;
                    border-radius:8px;
                "
                type="text">

        </div>

        {{-- Table --}}
        {{ $this->table }}

    </div>

    @unless (auth()->user()?->isAdmin())
        {{-- Pengumuman --}}
        <div class="mt-8">

            <div
                style="
            display:flex;
            align-items:center;
            gap:20px;
            padding:24px;
            margin-bottom:24px;
            background:#f0fdf4;
            border:1px solid #bbf7d0;
            border-radius:12px;
        ">

                <div style="font-size:50px;">
                    📢
                </div>

                <div>

                    <h2
                        style="
                    font-size:24px;
                    font-weight:700;
                    color:#166534;
                    margin:0;
                ">
                        Informasi Penting untuk Anggota
                    </h2>

                    <p style="
                    margin-top:6px;
                    color:#4b5563;
                ">
                        Dapatkan informasi terbaru mengenai kegiatan,
                        kebijakan, dan informasi penting lainnya dari KUD Kampar.
                    </p>

                </div>

            </div>

            @php
                $pengumumanList = \App\Models\Pengumuman::where('is_active', true)->orderBy('sort_order')->get();
            @endphp

            <div
                style="
            background:white;
            border:1px solid #e5e7eb;
            border-radius:12px;
            overflow:hidden;
        ">

                @forelse($pengumumanList as $pengumuman)
                    <div
                        style="
                    display:flex;
                    gap:20px;
                    padding:20px;
                    border-bottom:1px solid #e5e7eb;
                ">

                        {{-- Gambar --}}
                        <div style="flex-shrink:0;">

                            <img alt="{{ $pengumuman->title }}" src="{{ asset('storage/' . $pengumuman->image) }}"
                                style="
                            width:220px;
                            height:120px;
                            object-fit:cover;
                            border-radius:10px;
                        ">

                        </div>

                        {{-- Isi --}}
                        <div style="flex:1;">

                            {{-- Badge --}}
                            <div style="margin-bottom:10px;">
                                <span
                                    style="
                background:#f97316;
                color:white;
                padding:4px 10px;
                border-radius:999px;
                font-size:12px;
                font-weight:600;
            ">
                                    Penting
                                </span>
                            </div>

                            {{-- Judul --}}
                            <h3
                                style="
            font-size:24px;
            font-weight:700;
            margin-bottom:10px;
            color:#111827;
        ">
                                {{ $pengumuman->title }}
                            </h3>

                            {{-- Deskripsi --}}
                            <p
                                style="
            color:#4b5563;
            line-height:1.7;
            margin-bottom:15px;
        ">
                                {{ \Illuminate\Support\Str::limit($pengumuman->description, 180) }}
                            </p>

                            {{-- Footer --}}
                            <div
                                style="
            display:flex;
            gap:30px;
            align-items:center;
            color:#6b7280;
            font-size:14px;
        ">

                                <span>
                                    📅 {{ $pengumuman->created_at?->format('d M Y') }}
                                </span>

                                <span>
                                    📢 Pengumuman
                                </span>

                            </div>

                        </div>

                    </div>

                @empty

                    <div
                        style="
                    padding:40px;
                    text-align:center;
                    color:#6b7280;
                ">
                        Belum ada pengumuman.
                    </div>
                @endforelse

            </div>

        </div>
    @endunless

</x-filament-panels::page>
