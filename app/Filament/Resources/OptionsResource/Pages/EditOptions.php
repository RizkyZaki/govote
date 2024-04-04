<?php

namespace App\Filament\Resources\OptionsResource\Pages;

use App\Filament\Resources\OptionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOptions extends EditRecord
{
    protected static string $resource = OptionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
