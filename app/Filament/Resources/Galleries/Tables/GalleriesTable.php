<?php

namespace App\Filament\Resources\Galleries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class GalleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                ImageColumn::make('image')
                    ->label('Foto')
                    ->getStateUsing(
                        fn($record) => asset('storage/' . $record->image)
                    )
                    ->height(80),

                TextColumn::make('title')
                    ->label('Judul'),

                TextColumn::make('sort_order')
                    ->label('Urutan'),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),

                DeleteAction::make()
                    ->before(function ($record) {
                        if (
                            $record->image &&
                            Storage::disk('public')->exists($record->image)
                        ) {
                            Storage::disk('public')->delete($record->image);
                        }
                    }),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->before(function ($records) {
                            foreach ($records as $record) {
                                if (
                                    $record->image &&
                                    Storage::disk('public')->exists($record->image)
                                ) {
                                    Storage::disk('public')->delete($record->image);
                                }
                            }
                        }),
                ]),
            ]);
    }
}
