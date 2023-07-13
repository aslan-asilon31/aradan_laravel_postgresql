<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Models\Category\Category;
use DB;

class CategorySeeder extends Seeder
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
        
        $names = [
            'Fashion-Clothing',  // Fashion-Clothing : Including men's clothing, women's clothing, shoes, accessories, children's clothing, sports apparel, etc. 
            'Electronics',  // Electronics : Including smartphones, computers, laptops, tablets, cameras, audio devices, home electronics, etc.
            'Beauty-Personal-Care',  // Beauty-Personal-Care : Such as skincare products, hair care, cosmetics, perfumes, health and wellness products, etc.
            'Home-Garden',  // Home-Garden : Including home furnishings, interior decor, kitchen supplies, garden equipment, furniture, etc.
            'Food-Beverages',  // Food-Beverages :  Including processed food, beverages, snacks, health food, ingredients, etc.
            'Health-Fitness',  // Health-Fitness Such as supplements, fitness equipment, medical devices, health products, etc.
            'Hobbies-Toys',  // Hobbies-Toys : Including sports equipment, outdoor gear, toys, games, hobby supplies, etc.
            'Automotive',  // Automotive : Including automotive parts, accessories, car care products, etc.
            'Books-Media',  // Books-Media :  Including books, e-books, magazines, music, movies, etc.
            'Office-Supplies',  // Office-Supplies : Including stationery, office furniture, computer accessories, organizational products, etc.
        ];



        // 1
        DB::table('categories')->insert([
            'uuid' => 'd622ce29-70af-4291-8950-fe65608cb696',
            'name' => 'Fashion-Clothing',
            'image' => 'product-1.jpg',
            'slug' => '-',
        ]);

        // 2
        DB::table('categories')->insert([
            'uuid' => '576e5e4a-8498-4595-9d11-0e0737e4c2a9',
            'name' => 'Electronics',
            'image' => 'product-1.jpg',
            'slug' => '-',
        ]);

        // 3
        DB::table('categories')->insert([
            'uuid' => '1a305e4a-8498-4595-9d11-0e0737e4c2a9',
            'name' => 'Beauty-Personal-Care',
            'image' => 'product-1.jpg',
            'slug' => '-',
        ]);

        // 4
        DB::table('categories')->insert([
            'uuid' => '6a0f97f4-d39b-49ad-896f-e10f73dd529d',
            'name' => 'Home-Garden',
            'image' => 'product-1.jpg',
            'slug' => '-',
        ]);

        // 5
        DB::table('categories')->insert([
            'uuid' => 'c0cac19c-c502-4629-8780-13c929368cc3',
            'name' => 'Food-Beverages',
            'image' => 'product-1.jpg',
            'slug' => '-',
        ]);

        // 6
        DB::table('categories')->insert([
            'uuid' => 'd611ce29-70af-4291-8950-fe65608cb696',
            'name' => 'Health-Fitness',
            'image' => 'product-1.jpg',
            'slug' => '-',
        ]);

        // 7
        DB::table('categories')->insert([
            'uuid' => 'd15a4149-c502-4629-8780-13c929368cc3',
            'name' => 'Hobbies-Toys',
            'image' => 'product-1.jpg',
            'slug' => '-',
        ]);

        // 8
        DB::table('categories')->insert([
            'uuid' => '645a4149-1ea9-4867-b403-57b04de86c13',
            'name' => 'Automotive',
            'image' => 'product-1.jpg',
            'slug' => '-',
        ]);

        // 9
        DB::table('categories')->insert([
            'uuid' => '73041745-9d12-4ebe-9f40-1451ef5be077',
            'name' => 'Books-Media',
            'image' => 'product-1.jpg',
            'slug' => '-',
        ]);

        // 10
        DB::table('categories')->insert([
            'uuid' => '998480c2-01b4-4f8e-bdd8-8565abe04c42',
            'name' => 'Office-Supplies',
            'image' => 'product-1.jpg',
            'slug' => '-',
        ]);
      
    }
}
