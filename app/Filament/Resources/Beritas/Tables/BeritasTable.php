<?php

namespace App\Filament\Resources\Beritas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Enums\FiltersLayout;

class BeritasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('tanggal', 'desc')

            ->columns([

                ImageColumn::make('gambar')
                    ->label('Gambar Berita')
                    ->getStateUsing(
                        fn($record) => asset('storage/' . $record->gambar)
                    )
                    ->height(70)
                    ->width(110),

                TextColumn::make('judul')
                    ->label('Berita')
                    ->weight('bold')
                    ->description(
                        fn($record) => str($record->ringkasan)
                            ->limit(90)
                    )
                    ->wrap(),

                TextColumn::make('is_publish')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(
                        fn(bool $state) =>
                        $state ? 'Published' : 'Draft'
                    )
                    ->color(
                        fn(bool $state) =>
                        $state ? 'success' : 'warning'
                    ),

                TextColumn::make('views')
                    ->label('Views')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

            ])

            ->filters([])
            ->filtersLayout(FiltersLayout::AboveContent)
            ->recordActions([

                EditAction::make()
                    ->iconButton(),

                DeleteAction::make()
                    ->iconButton()
                    ->before(function ($record) {

                        if (
                            $record->gambar &&
                            Storage::disk('public')->exists($record->gambar)
                        ) {
                            Storage::disk('public')->delete($record->gambar);
                        }
                    }),

            ])
            ->emptyStateHeading('Belum ada berita')
            ->emptyStateDescription(
                'Klik tombol Buat Berita Baru untuk menambahkan berita.'
            )

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
