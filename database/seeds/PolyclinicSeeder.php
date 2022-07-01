<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PolyclinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 14; $i++){
            DB::table('polyclinics')->insert([
                'id' => $i,
                'title' => 'Поликлиника №'.$i,
            ]);
        }
    }
}
