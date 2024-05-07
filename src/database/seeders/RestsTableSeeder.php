<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'restpart' => '0',
            'rest_start_time' => '2011-11-11 14:00:00',
            'rest_end_time' => '2011-11-11 15:00:00'
        ];
        DB::table('rests')->insert($param);
    }
}
