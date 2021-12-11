<?php

use Illuminate\Database\Seeder;

class RekeningsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'BCA 501234565',
                'number' => '501234565'
            ],
            [
                'name' => 'BCA 234098754',
                'number' => '234098754'
            ]
        ];

        \App\Rekening::insert($data);
    }
}
