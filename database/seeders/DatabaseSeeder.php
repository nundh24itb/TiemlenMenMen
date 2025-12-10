<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'test@example.com'], // điều kiện tìm user
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // đặt password
            ]
        );
        // 1️⃣ Gọi CategorySeeder trước
        $this->call(\Database\Seeders\CategorySeeder::class);
        // Gọi seeder thêm sản phẩm
        $this->call(\Database\Seeders\ProductSeeder::class);
    }
}
