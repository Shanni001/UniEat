<?php
namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Restaurant;
use App\Models\Sale;
use App\Models\Customer;

class StatsAdminOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        return [
            Stat::make('Customers', Customer::query()->count())
                ->description('Total number of customers')
                ->descriptionIcon('heroicon-m-user-group') // Corrected icon name
                ->color('primary'),

            Stat::make('Restaurants', Restaurant::query()->count())
                ->description('Total number of restaurants')
                ->descriptionIcon('heroicon-o-map') // Changed to a valid icon
                ->color('info'),

            Stat::make('Sales', Sale::query()->count())
                ->description('Total number of sales')
                ->descriptionIcon('heroicon-o-currency-dollar') // Corrected icon name
                ->color('success'),
        ];
    }
}