<?php

use Illuminate\Database\Seeder;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Match::create([
            'match_members'     => '12',
            'max_f_difference'     => '5',
            'max_average_f_difference'     => '6',

        ]);
        Match::create([
            'match_members'     => '12',
            'max_f_difference'     => '4',
            'max_average_f_difference'     => '-1',

        ]);

    }
}
