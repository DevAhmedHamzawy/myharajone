<?php

use Illuminate\Database\Seeder;

class MemberShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_ships')->insert([
            ['name' => 'المجانية', 'free_commission' => 0, 'max_posts' => 4, 'turn_off_comments' => 0, 'feature_ads' => 0],
            ['name' => 'المميزة', 'free_commission' => 0, 'max_posts' => 20, 'turn_off_comments' => 1, 'feature_ads' => 0],
            ['name' => 'الذهبية', 'free_commission' => 1, 'max_posts' => -1, 'turn_off_comments' => 1, 'feature_ads' => 1],
        ]);
    }
}
