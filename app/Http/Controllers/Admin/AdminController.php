<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use App\Models\Product;
// use App\Models\Order;
// use App\Models\User;

// class AdminController extends Controller
// {
//     public function dashboard()
//     {
//         $productCount = Product::count();
//         $orderCount = Order::count();
//         $userCount = User::count();

//         $salesData = Order::selectRaw('DATE(created_at) as date, SUM(total) as total')
//             ->groupBy('date')->get();

//         return view('admin.dashboard', compact('productCount', 'orderCount', 'userCount', 'salesData'));
//     }
// }


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'productCount' => Product::count(),
            'categoryCount' => Category::count(),
            'orderCount'   => Order::count(),
        ]);
    }
}

// class AdminController extends Controller
// {
//     public function index()
//     {
//         return view('admin.dashboard', [
//             'users' => User::count(),
//             'products' => Product::count(),
//             'categories' => Category::count(),
//             'orders' => Order::count(),
//         ]);
//     }
// }


