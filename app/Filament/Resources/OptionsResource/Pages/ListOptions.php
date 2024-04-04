<?php

namespace App\Filament\Resources\OptionsResource\Pages;

use App\Filament\Resources\OptionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOptions extends ListRecords
{
    protected static string $resource = OptionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
