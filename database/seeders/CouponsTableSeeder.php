<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code'=> 'AZERTY',
            'value'=> 2
        ]);

        Coupon::create([
            'code'=> 'CINEPLUS',
            'value'=> 1
        ]);

        Coupon::create([
            'code'=> 'LES3AS',
            'value'=> 5
        ]);
    }
}
