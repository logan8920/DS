<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::create([
        //     'name' => 'Test User',
        //     'email' => 'admin1@gmail.com',
        //     'password' => 'admin123'
        // ]);

        DB::table('banners')->insert([
            'name' => 'Demo Banner 1',
            'image' => 'banner.jpg',
            'status' => 1,
            'created_at' => '2025-08-24 18:30:00',
            'updated_at' => '2025-08-24 18:30:00',
        ]);

        // DB::table('categories')->insert([
        //     [
        //         'name' => 'Electronic',
        //         'icon' => 'category-1.jpg',
        //         'is_active' => 1,
        //         'parent_id' => null,
        //         'created_at' => Carbon::parse('2025-08-24 18:30:00'),
        //         'updated_at' => Carbon::parse('2025-08-25 08:46:38'),
        //     ],
        //     [
        //         'name' => 'Mobile',
        //         'icon' => 'category-2.jpg',
        //         'is_active' => 1,
        //         'parent_id' => 1,
        //         'created_at' => Carbon::parse('2025-08-24 18:30:00'),
        //         'updated_at' => Carbon::parse('2025-08-25 08:50:11'),
        //     ],
        //     [
        //         'name' => 'Laptop',
        //         'icon' => 'category-3.jpg',
        //         'is_active' => 1,
        //         'parent_id' => 1,
        //         'created_at' => Carbon::parse('2025-08-24 18:30:00'),
        //         'updated_at' => Carbon::parse('2025-08-25 08:50:23'),
        //     ],
        //     [
        //         'name' => 'Fashion',
        //         'icon' => 'category-4.jpg',
        //         'is_active' => 1,
        //         'parent_id' => null,
        //         'created_at' => Carbon::parse('2025-08-24 18:30:00'),
        //         'updated_at' => Carbon::parse('2025-08-25 08:50:29'),
        //     ],
        //     [
        //         'name' => 'Men Clothing',
        //         'icon' => 'category-5.jpg',
        //         'is_active' => 1,
        //         'parent_id' => 4,
        //         'created_at' => Carbon::parse('2025-08-24 18:30:00'),
        //         'updated_at' => Carbon::parse('2025-08-25 08:50:43'),
        //     ],
        //     [
        //         'name' => 'Women Clothing',
        //         'icon' => 'category-6.jpg',
        //         'is_active' => 1,
        //         'parent_id' => 4,
        //         'created_at' => Carbon::parse('2025-08-24 18:30:00'),
        //         'updated_at' => Carbon::parse('2025-08-25 08:50:50'),
        //     ],
        // ]);

        $cat = DB::table("categories")->limit(6)->pluck("category_id");

        $products = [];

        for ($i = 1; $i <= 6; $i++) { // 6 categories
            for ($j = 1; $j <= 10; $j++) {
                $products[] = [
                    // 'product_id' => (($i - 1) * 10) + $j,
                    'category_id' => $cat[$i-1],
                    'seller_id' => 1,
                    'name' => "Product {$j} of Category {$i}",
                    'slug' => "Product {$j} of Category {$i}",
                    "sku" => "Product {$j} of Category {$i}",
                    'description' => "Description for Product {$j} in Category {$i}",
                    'price' => rand(100, 1000),
                    'discount_percentage' => rand(0,5),
                    'status' => ["Published","Draft","Inactive"][rand(0,2)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('products')->insert($products);

        $faker = Faker::create();
        $now   = Carbon::now();

        $products = DB::table('products')->pluck('product_id');
        $counter = 1;
        foreach ($products as $productId) {
            for ($i = 1; $i <= 2; $i++) {
                DB::table('product_images')->insert([
                    'product_id' => $productId,
                    'image_path' => "products/1-{$counter}-{$i}.jpg",
                    'alt_text'   => $faker->words(2, true),
                    'is_primary' => $i === 1 ? 1 : 0,
                    'is_active'  => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            $counter++;
        }
    }
}
