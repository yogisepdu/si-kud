<?php

namespace App\Filament\Resources\Beritas\Pages;

use App\Filament\Resources\Beritas\BeritaResource;
use App\Filament\Resources\Beritas\Widgets\BeritaStats;
use App\Filament\Resources\Beritas\Widgets\BeritaTerpopuler;
use Filament\Actions\CreateAction;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab as TabsTab;
use Illuminate\Database\Eloquent\Builder;

class ListBeritas extends ListRecords
{
    protected static string $resource = BeritaResource::class;

    public string $status = 'all';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(
                    fn () => auth()->user()?->isAdmin()
                ),
        ];
    }

    protected string $view =
    'filament.resources.beritas.pages.list-beritas';

    protected function getHeaderWidgets(): array
    {
        return [
            BeritaStats::class,
            BeritaTerpopuler::class,
        ];
    }

    public function getFilteredTableQuery(): Builder
    {
        $query = parent::getFilteredTableQuery();

        if (! auth()->user()?->isAdmin()) {

            return match ($this->status) {

                'popular' => $query
                    ->where('is_publish', true)
                    ->orderByDesc('views'),

                default => $query
                    ->where('is_publish', true),
            };
        }

        return match ($this->status) {

            'published' => $query
                ->where('is_publish', true),

            'draft' => $query
                ->where('is_publish', false),

            'popular' => $query
                ->orderByDesc('views'),

            default => $query,
        };
    }


    public function setStatus(string $status): void
    {
        $this->status = $status;

        $this->resetTable();
    }

    // public function getTabs(): array
    // {
    //     return [
    //         'all' => TabsTab::make('Semua'),

    //         'published' => TabsTab::make('Published')
    //             ->modifyQueryUsing(
    //                 fn($query) => $query->where('is_publish', true)
    //             ),

    //         'draft' => TabsTab::make('Draft')
    //             ->modifyQueryUsing(
    //                 fn($query) => $query->where('is_publish', false)
    //             ),

    //         'arsip' => TabsTab::make('Arsip')
    //             ->modifyQueryUsing(
    //                 fn($query) => $query->whereDate('tanggal', '<', now())
    //             ),
    //     ];
    // }
}
