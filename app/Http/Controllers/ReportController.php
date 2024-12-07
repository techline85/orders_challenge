<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function generateReport()
    {
        $totalOrders = Order::count();
        $totalProductsSold = Order::join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->sum('order_products.quantity');

        $totalRevenue = Order::join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->sum(DB::raw('order_products.quantity * products.price'));

        return response()->json([
            'total_orders' => $totalOrders,
            'total_products_sold' => $totalProductsSold,
            'total_revenue' => $totalRevenue,
        ]);
    }
}
