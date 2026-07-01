<?php

namespace App\Filament\Resources\Pinjaman\Pages;

use App\Filament\Resources\Pinjaman\PinjamanResource;
use App\Filament\Resources\Pinjaman\Widgets\PinjamanStats;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Livewire\Component;

class ListPinjaman extends ListRecords
{
    protected static string $resource = PinjamanResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [];

        if (auth()->user()?->isAnggota()) {
            $actions[] = CreateAction::make()
                ->label('Ajukan Pinjaman')
                ->icon('heroicon-o-banknotes');
        }

        if (auth()->user()?->isAdmin()) {

            $actions[] = Action::make('aturBunga')
                ->label('Atur Bunga Pinjaman')
                ->icon('heroicon-o-percent-badge')
                ->color('warning')

                ->fillForm([
                    'bunga' => Setting::get(
                        'bunga_pinjaman',
                        0
                    ),
                ])

                ->form([

                    TextInput::make('bunga')
                        ->label('Persentase Bunga (%)')
                        ->numeric()
                        ->minValue(0)
                        ->maxValue(100)
                        ->required()
                        ->suffix('%'),

                ])

                ->action(function (array $data, Component $livewire) {

                    Setting::set(
                        'bunga_pinjaman',
                        $data['bunga']
                    );

                    Notification::make()
                        ->title('Berhasil')
                        ->success()
                        ->send();

                    $livewire->dispatch('refreshStats');
                });
        }

        return $actions;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PinjamanStats::class,
        ];
    }
}
