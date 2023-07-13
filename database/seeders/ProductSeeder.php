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
            'd622ce29-70af-4291-8950-fe65608cb696',  // Fashion-Clothing : Including men's clothing, women's clothing, shoes, accessories, children's clothing, sports apparel, etc. 
            '576e5e4a-8498-4595-9d11-0e0737e4c2a9',  // Electronics : Including smartphones, computers, laptops, tablets, cameras, audio devices, home electronics, etc.
            '1a305e4a-8498-4595-9d11-0e0737e4c2a9',  // Beauty-Personal-Care : Such as skincare products, hair care, cosmetics, perfumes, health and wellness products, etc.
            '6a0f97f4-d39b-49ad-896f-e10f73dd529d',  // Home-Garden : Including home furnishings, interior decor, kitchen supplies, garden equipment, furniture, etc.
            'c0cac19c-c502-4629-8780-13c929368cc3',  // Food-Beverages :  Including processed food, beverages, snacks, health food, ingredients, etc.
            'd611ce29-70af-4291-8950-fe65608cb696',  // Health-Fitness Such as supplements, fitness equipment, medical devices, health products, etc.
            'd15a4149-c502-4629-8780-13c929368cc3',  // Hobbies-Toys : Including sports equipment, outdoor gear, toys, games, hobby supplies, etc.
            '645a4149-1ea9-4867-b403-57b04de86c13',  // Automotive : Including automotive parts, accessories, car care products, etc.
            '73041745-9d12-4ebe-9f40-1451ef5be077',  // Books-Media :  Including books, e-books, magazines, music, movies, etc.
            '998480c2-01b4-4f8e-bdd8-8565abe04c42',  // Office-Supplies : Including stationery, office furniture, computer accessories, organizational products, etc.
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
            $categoryUuid = $category_ids[array_rand($category_ids)];
            $name = $names[array_rand($names)];
            $image = 'product-' . ($i + 1) . '.jpg';
            $price = mt_rand(1000000, 5000000);
            $stock = mt_rand(0, 100);
            $discount = mt_rand(0, 50);
            $status = $statuses[array_rand($statuses)];
            $slug = '-';
            $description = '-';

            DB::table('products')->insert([
                'uuid' => $uuid,
                'category_uuid' => $categoryUuid,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'stock' => $stock,
                'discount' => $discount,
                'status' => $status,
                'slug' => $slug,
                'description' => $description,
            ]);
        }
      
    }
}
