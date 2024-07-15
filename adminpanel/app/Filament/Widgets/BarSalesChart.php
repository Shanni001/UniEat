<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Customer;
use App\Models\Restaurant;
use App\Models\University;

class BarSalesChart extends ChartWidget
{
    protected static ?string $heading = 'Total Numbers';

    protected function getData(): array
    {
        $totalCustomers = Customer::count();
        $totalRestaurants = Restaurant::count();
        $totalUniversities = University::count();

        return [
            'labels' => ['Customers', 'Restaurants', 'Universities'],
            'datasets' => [
                [
                    'label' => 'Total Count',
                    'backgroundColor' => ['rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    'borderColor' => ['rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    'borderWidth' => 1,
                    'data' => [$totalCustomers, $totalRestaurants, $totalUniversities],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
