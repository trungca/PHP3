<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(15)->create();
        // DB::table('products')->insert([
        //     'name' => 'trung',
        //     'price' =>'500',
        //     'image' => 'https://ik.imagekit.io/tvlk/blog/2021/09/du-lich-anh-2.jpg?tr=dpr-2,w-675',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
    }
}
