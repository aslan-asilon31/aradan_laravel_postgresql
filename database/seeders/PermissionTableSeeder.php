<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            'multipleprice-list',
            'multipleprice-create',
            'multipleprice-edit',
            'multipleprice-delete',
            'payment-list',
            'payment-create',
            'payment-edit',
            'payment-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
         ];
 
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
