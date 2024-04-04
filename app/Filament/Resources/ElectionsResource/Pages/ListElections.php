<?php

namespace App\Filament\Resources\ElectionsResource\Pages;

use App\Filament\Resources\ElectionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListElections extends ListRecords
{
    protected static string $resource = ElectionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
