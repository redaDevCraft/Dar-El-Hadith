<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\news;
use App\Models\User;

class NewsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //make the "total news string translabale and add the count of news
            Stat::make(__('Total news'), News::count()) // Translate "Total news" using __() helper
              ->description(__('All news in the database'))
            ->descriptionIcon('heroicon-m-newspaper'),
            Stat::make(__('Total Admins'), User::count()) // Translate "Total users" using __() helper
            ->description(__('All Admins in the database'))
            ->descriptionIcon('heroicon-m-user-group'),
        
        ];
    }
}