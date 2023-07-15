<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'aslansuperadmin', 
            'email' => 'aslansuperadmin@gmail.com',
            'password' => bcrypt('aslansuperadmin'),
            'image' => 'img.jpg',
            'role' => 'superadmin',
            'phone' => '083958437',
            'status' => 'active',
            'is_active' => '-',
            'last_seen' => '-',
            'desc' => '-',
            'slug' => '-',
        ]);

        $role = Role::create(['name' => 'superadmin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
