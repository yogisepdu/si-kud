<?php

namespace App\Filament\Resources\Beritas\Widgets;

use App\Models\Berita;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class BeritaTerpopuler extends TableWidget
{
    protected static ?string $heading = '🔥 3 Berita Terpopuler';

    protected int|string|array $columnSpan = 'full';

    public static function canView(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Berita::where('is_publish', true)
                    ->orderByDesc('views')
                    ->limit(3)
            )
            ->columns([

                ImageColumn::make('gambar')
                    ->label('')
                    ->circular(false)
                    ->height(60)
                    ->getStateUsing(
                        fn ($record) => asset('storage/' . $record->gambar)
                    ),

                TextColumn::make('judul')
                    ->weight('bold')
                    ->searchable()
                    ->limit(60),

                TextColumn::make('views')
                    ->label('Dilihat')
                    ->badge()
                    ->color('success'),

                TextColumn::make('tanggal')
                    ->date('d M Y'),
            ]);
    }
}