<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
       for ($i = 0; $i<50; $i++){
           DB::table('products')->insert([
               'book_name' => 'Book Name'  . Str::random(5),
               'publisher_name' => 'Publisher '  . Str::random(5),
               'writer_name' =>'Writer Name '  .  Str::random(5),
               'stock' => random_int(2,30),
               'price' => random_int(2,530),
               'category_id' => random_int(2,30),
               'image' => '1619428702.jpg',
               'description' => Str::random(50),
               'seller_id' => random_int(1,2),
               'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
               'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
           ]);
       }
    }
}
