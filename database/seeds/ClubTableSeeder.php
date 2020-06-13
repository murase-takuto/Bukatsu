<?php

use App\Club;
use Illuminate\Database\Seeder;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $club = Club::create([
            'name' => '市立千葉高校サッカー部',
            'email' => 'chiba@localhost',
            'tel' => '8888888',
            'post_number' => '2660606',
            'prefecture_id' => 13,
            'city_id' => 9,
        ]);
    }
}
