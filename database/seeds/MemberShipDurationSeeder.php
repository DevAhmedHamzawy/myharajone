<?php

use Illuminate\Database\Seeder;

class MemberShipDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_ship_durations')->insert([
            ['membership_id' => 1, 'display_name' => 'مدى الحياه', 'duration' => -1, 'price' => -1],
            ['membership_id' => 2, 'display_name' => 'شهر'  , 'duration' => 1, 'price' => 50],
            ['membership_id' => 2, 'display_name' => '6 شهور', 'duration' => 6, 'price' => 200],
            ['membership_id' => 2, 'display_name' => 'سنة', 'duration' => 12, 'price' => 400],
            ['membership_id' => 3, 'display_name' => 'شهر', 'duration' => 1, 'price' => 200],
            ['membership_id' => 3, 'display_name' => '6 شهور', 'duration' => 6, 'price' => 1000],
            ['membership_id' => 3, 'display_name' => 'سنة', 'duration' => 12, 'price' => 1800],
        ]);
    }
}
