<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '111',
            'workpart' => '0',
            'work_start_time' => '2011-11-11 7:00:00',
            'work_end_time' => '2011-11-11 19:00:00'
        ];
        DB::table('works')->insert($param);
    }
}
