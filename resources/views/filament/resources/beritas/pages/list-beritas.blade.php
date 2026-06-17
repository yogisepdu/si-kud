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

                @if(auth()->user()?->isAdmin())

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

</x-filament-panels::page>
