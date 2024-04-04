<?php

namespace App\Filament\Resources\OptionsResource\Pages;

use App\Filament\Resources\OptionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOptions extends ViewRecord
{
    protected static string $resource = OptionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
