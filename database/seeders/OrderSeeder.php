<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order\Order;
use DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            'payment_id' => 1,
            'order_code' => 'fe65608cb696',
            'grant_total' => 4500000,
            'status' => 'Paid',
            'account_bank' => 'Mandiri',
            'snap_token' => 'fe65608cb696',
            'slug' => '-',
        ]);
        DB::table('orders')->insert([
            'payment_id' => 2,
            'order_code' => 'fe65608cb696',
            'grant_total' => 41500000,
            'status' => 'Unpaid',
            'account_bank' => 'BRI',
            'snap_token' => 'fe65608cb696',
            'slug' => '-',
        ]);
        DB::table('orders')->insert([
            'payment_id' => 2,
            'order_code' => 'fe65608cb696',
            'grant_total' => 3500000,
            'status' => 'Failed',
            'account_bank' => 'BCA',
            'snap_token' => 'fe65608cb696',
            'slug' => '-',
        ]);
        DB::table('orders')->insert([
            'payment_id' => 3,
            'order_code' => 'fe65608cb696',
            'grant_total' => 4500000,
            'status' => 'Paid',
            'account_bank' => 'Mandiri',
            'snap_token' => 'fe65608cb696',
            'slug' => '-',
        ]);
        DB::table('orders')->insert([
            'payment_id' => 2,
            'order_code' => 'fe65608cb696',
            'grant_total' => 41500000,
            'status' => 'Unpaid',
            'account_bank' => 'BRI',
            'snap_token' => 'fe65608cb696',
            'slug' => '-',
        ]);
        DB::table('orders')->insert([
            'payment_id' => 4,
            'order_code' => 'fe65608cb696',
            'grant_total' => 3500000,
            'status' => 'Failed',
            'account_bank' => 'BCA',
            'snap_token' => 'fe65608cb696',
            'slug' => '-',
        ]);
    }
}
