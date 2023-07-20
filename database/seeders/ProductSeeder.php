<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Models\Product\Product;
use DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        $category_ids = [
            1,  // Fashion-Clothing : Including men's clothing, women's clothing, shoes, accessories, children's clothing, sports apparel, etc. 
            2,  // Electronics : Including smartphones, computers, laptops, tablets, cameras, audio devices, home electronics, etc.
            3,  // Beauty-Personal-Care : Such as skincare products, hair care, cosmetics, perfumes, health and wellness products, etc.
            4,  // Home-Garden : Including home furnishings, interior decor, kitchen supplies, garden equipment, furniture, etc.
            5,  // Food-Beverages :  Including processed food, beverages, snacks, health food, ingredients, etc.
            6,  // Health-Fitness Such as supplements, fitness equipment, medical devices, health products, etc.
            7,  // Hobbies-Toys : Including sports equipment, outdoor gear, toys, games, hobby supplies, etc.
            8,  // Automotive : Including automotive parts, accessories, car care products, etc.
            9,  // Books-Media :  Including books, e-books, magazines, music, movies, etc.
            10,  // Office-Supplies : Including stationery, office furniture, computer accessories, organizational products, etc.
        ];
        $statuses = ['oos', 'po', 'bo', 'd', 'cs', 'le', 'so'];
        $names = [
            'Nike SB Blue', 
            'Nike SB White', 
            'Nike SB Pink', 
            'Nike SB Yellow', 
            'Nike SB Black', 
        ];

        for ($i = 0; $i < 20; $i++) {
            $uuid = 'category' . ($i + 1) ;
            $categoryid = $category_ids[array_rand($category_ids)];
            $customer_experience_id = mt_rand(0, 10);
            $name = $names[array_rand($names)];
            $image = 'product-' . ($i + 1) . '.jpg';
            $price = mt_rand(1000000, 5000000);
            $stock = mt_rand(0, 100);
            $discount = mt_rand(0, 50);
            $status = $statuses[array_rand($statuses)];
            $rating = mt_rand(0, 100);
            $slug = '-';
            $description = '-';

            DB::table('products')->insert([
                // 'uuid' => $uuid,
                'category_id' => $categoryid,
                'customer_experience_id' => $customer_experience_id,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'stock' => $stock,
                'discount' => $discount,
                'status' => $status,
                'rating' => $rating,
                'slug' => $slug,
                'description' => $description,
            ]);
        }
      
    }
}
