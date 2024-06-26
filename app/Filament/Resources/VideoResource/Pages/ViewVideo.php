<?php

namespace App\Filament\Resources\VideoResource\Pages;

use App\Filament\Resources\VideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVideo extends ViewRecord
{
    protected static string $resource = VideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}