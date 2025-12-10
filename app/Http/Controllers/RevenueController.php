<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function revenueChart()
    {
        $revenues = Order::selectRaw('DATE(created_at) as date, SUM(total) as total')
                         ->groupBy('date')
                         ->orderBy('date')
                         ->get();

        $dates = $revenues->pluck('date');
        $totals = $revenues->pluck('total');

        return view('charts.revenue', compact('dates', 'totals'));
    }
}
