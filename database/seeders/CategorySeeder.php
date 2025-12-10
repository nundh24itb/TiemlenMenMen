<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Len Acrylic', 'code' => 'A'],
            ['name' => 'Len Wool', 'code' => 'W'],
            ['name' => 'Len Cotton', 'code' => 'C'],
            ['name' => 'Kim móc & Dụng cụ', 'code' => 'K'],
            ['name' => 'Bộ kit', 'code' => 'B'],
            ['name' => 'Phụ kiện', 'code' => 'P'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
