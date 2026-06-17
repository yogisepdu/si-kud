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
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Support\Enums\FontWeight;
use Filament\Actions\Action;

class BeritasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('tanggal', 'desc')
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])

            ->columns([
                Stack::make([

                    ImageColumn::make('gambar')
                        ->getStateUsing(
                            fn($record) => asset('storage/' . $record->gambar)
                        )
                        ->height(250)
                        ->extraImgAttributes([
                            'style' => '
                            width:100%;
                            height:250px;
                            object-fit:cover;
                            border-radius:12px;
                        ',
                        ]),

                    TextColumn::make('tanggal')
                        ->badge()
                        ->color('success')
                        ->date('d M Y'),

                    TextColumn::make('judul')
                        ->weight(FontWeight::Bold)
                        ->limit(60)
                        ->searchable(),

                    TextColumn::make('ringkasan')
                        ->limit(120)
                        ->wrap(),

                    Split::make([

                        TextColumn::make('tanggal')
                            ->icon('heroicon-o-calendar')
                            ->date('d M Y')
                            ->color('gray'),

                        TextColumn::make('views')
                            ->icon('heroicon-o-eye')
                            ->formatStateUsing(fn($state) => "{$state} Dilihat")
                            ->color('gray'),

                    ]),

                ])
            ])

            ->filters([])
            ->filtersLayout(FiltersLayout::AboveContent)
            ->recordActions([
                Action::make('view')
                    ->label('Lihat Berita')
                    ->icon('heroicon-o-eye')
                    ->color('success')
                    ->url(
                        fn($record) => route('berita.detail', $record->slug)
                    )
                    ->openUrlInNewTab(),
                EditAction::make()
                    ->iconButton()
                    ->visible(
                        fn() => auth()->user()?->isAdmin()
                    ),

                DeleteAction::make()
                    ->iconButton()
                    ->visible(
                        fn() => auth()->user()?->isAdmin()
                    )
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

            ->toolbarActions([]);
    }
}
