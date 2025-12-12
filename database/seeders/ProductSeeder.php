<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Len Acrylic 50g', 'category_id' => 1, 'price' => 120000, 'description' => 'Len Acrylic mềm mại', 'image' => 'acrylic.jpg'],
            ['name' => 'Len Wool 100g', 'category_id' => 2, 'price' => 150000, 'description' => 'Len Wool chất lượng', 'image' => 'wool.jpg'],
            ['name' => 'Len Cotton 50g', 'category_id' => 3, 'price' => 110000, 'description' => 'Len Cotton thoáng mát', 'image' => 'cotton.jpg'],
            ['name' => 'Bộ kim móc 5 cây', 'category_id' => 4, 'price' => 80000, 'description' => 'Bộ kim móc đầy đủ', 'image' => 'hook.jpg'],
            ['name' => 'Bộ kit móc', 'category_id' => 5, 'price' => 200000, 'description' => 'Bộ kit đa dạng', 'image' => 'kit.jpg'],
            ['name' => 'Phụ kiện len', 'category_id' => 6, 'price' => 50000, 'description' => 'Các phụ kiện cần thiết', 'image' => 'accessory.jpg'],
            // Len Acrylic
            ['name' => 'Len Acrylic 100g', 'category_id' => 1, 'price' => 220000, 'description' => 'Len Acrylic lớn', 'image' => 'acrylic_large.jpg'],
            ['name' => 'Len Acrylic Color Mix', 'category_id' => 1, 'price' => 250000, 'description' => 'Len Acrylic nhiều màu', 'image' => 'acrylic_color.jpg'],

            // Len Wool
            ['name' => 'Len Wool 200g', 'category_id' => 2, 'price' => 300000, 'description' => 'Len Wool lớn', 'image' => 'wool_large.jpg'],
            ['name' => 'Len Wool Soft', 'category_id' => 2, 'price' => 180000, 'description' => 'Len Wool mềm mại', 'image' => 'wool_soft.jpg'],

            // Len Cotton
            ['name' => 'Len Cotton 100g', 'category_id' => 3, 'price' => 210000, 'description' => 'Len Cotton lớn', 'image' => 'cotton_large.jpg'],
            ['name' => 'Len Cotton Organic', 'category_id' => 3, 'price' => 250000, 'description' => 'Len Cotton hữu cơ', 'image' => 'cotton_organic.jpg'],

            // Kim móc & Dụng cụ
            ['name' => 'Kim móc nhỏ', 'category_id' => 4, 'price' => 40000, 'description' => 'Kim móc size nhỏ', 'image' => 'hook_small.jpg'],
            ['name' => 'Kim móc lớn', 'category_id' => 4, 'price' => 60000, 'description' => 'Kim móc size lớn', 'image' => 'hook_large.jpg'],

            // Bộ kit
            ['name' => 'Bộ kit mini', 'category_id' => 5, 'price' => 120000, 'description' => 'Bộ kit nhỏ gọn', 'image' => 'kit_mini.jpg'],
            ['name' => 'Bộ kit chuyên nghiệp', 'category_id' => 5, 'price' => 350000, 'description' => 'Bộ kit đầy đủ dụng cụ', 'image' => 'kit_pro.jpg'],

            // Phụ kiện
            ['name' => 'Phụ kiện len đa dạng', 'category_id' => 6, 'price' => 70000, 'description' => 'Phụ kiện đầy đủ', 'image' => 'phukien.jpg'],
            ['name' => 'Băng đô len', 'category_id' => 6, 'price' => 30000, 'description' => 'Băng đô nhiều màu', 'image' => 'bangdo.jpg'],
        ];

        // foreach ($products as $prod) {
        //     Product::create($prod);
        // }
        foreach ($products as $prod) {
            Product::updateOrCreate(
                ['name' => $prod['name']], // điều kiện tìm sản phẩm
                $prod                       // dữ liệu sẽ update hoặc insert
            );
        }
    }
}
