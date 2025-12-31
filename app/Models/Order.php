<?php

// namespace App\Models;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Order extends Model
// {
//     use HasFactory;

//     protected $fillable = ['user_id', 'total_price', 'status'];
//     public function revenueChart()
//     {
//     // Lấy doanh thu theo ngày
//     $revenues = Order::selectRaw('DATE(created_at) as date, SUM(total) as total')
//                      ->groupBy('date')
//                      ->orderBy('date')
//                      ->get();

//     // Chuyển dữ liệu ra array để dùng cho chart
//     $dates = $revenues->pluck('date');   // ['2025-11-20', '2025-11-21', ...]
//     $totals = $revenues->pluck('total'); // [100000, 200000, ...]

//     return view('charts.revenue', compact('dates', 'totals'));
//     }
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

        public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}


// namespace App\Models;


// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;


// class Order extends Model
// {
// use HasFactory;


// protected $guarded = [];


// public function items()
// {
// return $this->hasMany(OrderItem::class);
// }


// public function user()
// {
// return $this->belongsTo(User::class);
// }
// }
