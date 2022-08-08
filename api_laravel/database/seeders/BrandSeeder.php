<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => 'Electrolux',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Brastemp',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Fischer',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Samsung',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'LG',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        DB::table('brands')->insert($brands);
    }
}
