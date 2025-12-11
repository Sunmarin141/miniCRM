<?php

namespace Database\Seeders;

use App\Models\Good;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $goods = [
            [
                'code' => 148832,
                'title' => 'iPhone 14 Pro Max',
                'price' => 129990,
                'discount' => 15000
            ],
            [
                'code' => 756423,
                'title' => 'Samsung Galaxy S23 Ultra',
                'price' => 109990,
                'discount' => 10000
            ],
            [
                'code' => 392847,
                'title' => 'MacBook Air M2',
                'price' => 149990,
                'discount' => 0
            ],
            [
                'code' => 615239,
                'title' => 'Sony PlayStation 5',
                'price' => 54990,
                'discount' => 5000
            ],
            [
                'code' => 928374,
                'title' => 'LG OLED TV 55"',
                'price' => 89990,
                'discount' => 18000
            ],
            [
                'code' => 473856,
                'title' => 'AirPods Pro 2',
                'price' => 24990,
                'discount' => 0
            ],
            [
                'code' => 581923,
                'title' => 'Xiaomi Mi Band 8',
                'price' => 3990,
                'discount' => 1000
            ],
            [
                'code' => 204765,
                'title' => 'iPad Pro 12.9',
                'price' => 119990,
                'discount' => 12000
            ],
            [
                'code' => 837492,
                'title' => 'Dell XPS 15',
                'price' => 159990,
                'discount' => 0
            ],
            [
                'code' => 694218,
                'title' => 'Canon EOS R6',
                'price' => 179990,
                'discount' => 20000
            ],
            [
                'code' => 312057,
                'title' => 'Nintendo Switch OLED',
                'price' => 34990,
                'discount' => 0
            ],
            [
                'code' => 546789,
                'title' => 'JBL Charge 5',
                'price' => 12990,
                'discount' => 3000
            ],
            [
                'code' => 975431,
                'title' => 'Dyson V15 Detect',
                'price' => 69990,
                'discount' => 8000
            ],
            [
                'code' => 128563,
                'title' => 'Apple Watch Series 9',
                'price' => 44990,
                'discount' => 0
            ],
            [
                'code' => 763294,
                'title' => 'Samsung QLED 65"',
                'price' => 139990,
                'discount' => 25000
            ]
        ];
        foreach($goods as $good){
            Good::create($good);    
        }
    }
}
