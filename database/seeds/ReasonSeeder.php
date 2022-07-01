<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reasons')->insert([
            'id' => 1,
            'title' => 'Врачебная этика'
        ]);
        DB::table('reasons')->insert([
            'id' => 2,
            'title' => 'Очередь'
        ]);
        DB::table('reasons')->insert([
            'id' => 3,
            'title' => 'Внешний вид'
        ]);
        DB::table('reasons')->insert([
            'id' => 4,
            'title' => 'Состояние клиники'
        ]);
        DB::table('reasons')->insert([
            'id' => 5,
            'title' => 'Работа регистратуры'
        ]);
    }
}
