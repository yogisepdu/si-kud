<?php

namespace App\Filament\Resources\Profiles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class ProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('history')
                    ->label('Sejarah')
                    ->limit(100)
                    ->html(),

                TextColumn::make('vision')
                    ->label('Visi')
                    ->limit(50)
                    ->html(),

                ImageColumn::make('structure_image')
                    ->label('Struktur')
                    ->getStateUsing(
                        fn($record) => $record->structure_image
                            ? asset('storage/' . $record->structure_image)
                            : null
                    )
                    ->height(60),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
                    ->before(function ($record) {
                        if ($record->structure_image) {
                            Storage::disk('public')->delete($record->structure_image);
                        }
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
