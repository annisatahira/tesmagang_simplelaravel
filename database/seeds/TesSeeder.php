<?php

use Illuminate\Database\Seeder;

class TesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        DB::table('tesmagang')->insert([
            '_trxhash' => str_random(255),
            '_from' => str_random(255),
     		'_to' => str_random(255),
            '_amount' =>  0,
            '_status' => str_random(255),
        ]);
    }
}
