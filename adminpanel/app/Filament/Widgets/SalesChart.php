<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SalesChart extends ChartWidget
{
    protected static ?string $heading = 'Number of Customers per Restaurant';

    protected function getData(): array
    {
        // Fetch the number of customers per restaurant
        $data = Sale::select('rest_name', DB::raw('count(customer_id) as customer_count'))
            ->groupBy('rest_name')
            ->orderBy('customer_count', 'desc')
            ->get();

        // Prepare the data for the chart
        $restaurantNames = $data->pluck('rest_name')->toArray();
        $customerCounts = $data->pluck('customer_count')->toArray();

        return [
            'labels' => $restaurantNames,
            'datasets' => [
                [
                    'label' => 'Number of Customers',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                    'data' => $customerCounts,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
