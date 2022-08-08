<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplianceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appliances = [
            [
                'name' => 'Geladeira Frost Free',
                'description' => 'Este produto é totalmente versátil. Tudo para ser personalizado para comportar o que você preferir.',
                'voltage' => '220',
                'brand_id' => '1',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Televisão LCD',
                'description' => 'Produto novo.',
                'voltage' => '110',
                'brand_id' => '5',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Monitor 4K',
                'description' => 'Produto em bom estado.',
                'voltage' => '110',
                'brand_id' => '5',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Microondas',
                'description' => 'Produto com marcas de uso.',
                'voltage' => '220',
                'brand_id' => '2',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Geladeira e Refrigerador',
                'description' => 'Produto com várias funções.',
                'voltage' => '110',
                'brand_id' => '3',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Geladeira',
                'description' => 'Este produto é totalmente versátil. Tudo para ser personalizado para comportar o que você preferir.',
                'voltage' => '220',
                'brand_id' => '4',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        DB::table('appliances')->insert($appliances);
    }
}
