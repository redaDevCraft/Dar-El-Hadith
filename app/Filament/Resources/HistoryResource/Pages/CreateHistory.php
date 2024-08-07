<?php

namespace App\Filament\Resources\HistoryResource\Pages;

use App\Filament\Resources\HistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

class CreateHistory extends CreateRecord
{
    protected static string $resource = HistoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Check if there's already a record in the history table
        if ($this->historyCount() >= 1) {
            throw new \Exception('Only one record is allowed in the history table');
        }

        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function historyCount(): int
    {
        // Replace 'history_table' with the actual name of your history table
        return DB::table('histories')->count();
    }
}