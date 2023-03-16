<?php

namespace Database\Seeders;

use App\Models\Leave;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $data = [
//            ['name'=>'Pens', 'quantity'=>'57', 'cost_price'=>'3','code' => 'PEN3967607','created_at' => $now, 'updated_at' => $now],
//            ['name'=>'Books', 'quantity'=>'346', 'cost_price'=>'5','code' => 'PRO98hgw','created_at' => $now, 'updated_at' => $now],
//            ['name'=>'Airmax', 'quantity'=>'78', 'cost_price'=>'170','code' => 'Air567y','created_at' => $now, 'updated_at' => $now],
//            ['name'=>'iphone', 'quantity'=>'46', 'cost_price'=>'10000','code' => 'IP680','created_at' => $now, 'updated_at' => $now],
//            ['name'=>'Mouse', 'quantity'=>'3', 'cost_price'=>'90','code' => 'MOuf567y','created_at' => $now, 'updated_at' => $now],
//            ['name'=>'Keyboard', 'quantity'=>'43', 'cost_price'=>'84','code' => 'PRff90','created_at' => $now, 'updated_at' => $now],
//
            ];

        Product::query()->insertOrIgnore($data);
    }
}
