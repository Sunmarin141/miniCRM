<?php

namespace Database\Seeders;

use App\Models\StoreGoodPivot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreGoodPivotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $storeGoodsPivot = [
            ['store_id' => 2, 'good_id' => 1, 'quantity' => 5],
            ['store_id' => 3, 'good_id' => 1, 'quantity' => 3],
            ['store_id' => 2, 'good_id' => 2, 'quantity' => 7],
            ['store_id' => 3, 'good_id' => 3, 'quantity' => 2],
            ['store_id' => 2, 'good_id' => 4, 'quantity' => 9],
            ['store_id' => 3, 'good_id' => 5, 'quantity' => 1],
            ['store_id' => 2, 'good_id' => 6, 'quantity' => 4],
            ['store_id' => 3, 'good_id' => 6, 'quantity' => 8],
            ['store_id' => 2, 'good_id' => 7, 'quantity' => 6],
            ['store_id' => 3, 'good_id' => 8, 'quantity' => 3],
            ['store_id' => 2, 'good_id' => 9, 'quantity' => 2],
            ['store_id' => 3, 'good_id' => 10, 'quantity' => 10],
            ['store_id' => 2, 'good_id' => 11, 'quantity' => 5],
            ['store_id' => 3, 'good_id' => 12, 'quantity' => 7],
            ['store_id' => 2, 'good_id' => 13, 'quantity' => 1],
            ['store_id' => 3, 'good_id' => 13, 'quantity' => 4],
            ['store_id' => 2, 'good_id' => 14, 'quantity' => 8],
            ['store_id' => 3, 'good_id' => 15, 'quantity' => 6],
            ['store_id' => 2, 'good_id' => 15, 'quantity' => 3],
            ['store_id' => 3, 'good_id' => 5, 'quantity' => 9],
        ];
        foreach($storeGoodsPivot as $field){
            StoreGoodPivot::create($field);
        }        
    }
}
