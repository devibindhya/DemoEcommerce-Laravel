<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name'=>'Motorola Mobile',
            'price'=>'100euro ',
            'description'=>'Samrtphone with 8Gb Ram',
            'category'=>'Mobiles',
            'gallery'=>'https://cdn.pocket-lint.com/r/s/970x/assets/images/151458-phones-news-moto-edge-plus-image1-68ovxymtlf-jpg.webp'
            ],
            ['name'=>'Samsung TV',
            'price'=>'500euro ',
            'description'=>'Samrtphone with CURVED m',
            'category'=>'TV',
            'gallery'=>'https://cdn.shopify.com/s/files/1/2660/5202/products/am1b6aqoaovlr9feumj5_800x.jpg?v=1607627932'
        ],
            ['name'=>'Apple Mobile',
            'price'=>'200 euro',
            'description'=>'Samrtphone with 12Gb Ram',
            'category'=>'Mobiles',
            'gallery'=>'https://bgr.com/wp-content/uploads/2020/10/iPhone-12-Pro-1.jpg'
            ]
        ]);
    }
}
