<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $carts = [
            ['product_id' => 1, 'quantity' => 2],
            ['product_id' => 3, 'quantity' => 1],
            ['product_id' => 5, 'quantity' => 4],
        ];

        foreach ($carts as $cart) {
            Cart::create($cart);
        }
    }
}
