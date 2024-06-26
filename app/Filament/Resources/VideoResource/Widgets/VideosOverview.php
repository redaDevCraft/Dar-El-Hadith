<?php

namespace App\Filament\Resources\VideoResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Video;


class VideosOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__('Total videos'), Video::count()) // Translate "Total news" using __() helper
              ->description(__('All videos in the database'))
            ->descriptionIcon('heroicon-m-video-camera'),
        ];
    }
}