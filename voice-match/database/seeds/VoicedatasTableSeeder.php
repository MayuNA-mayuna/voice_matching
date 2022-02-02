<?php

use Illuminate\Database\Seeder;

class VoicedatasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //データのクリア
    DB::table('voicedatas')->truncate();

    $param =[
        [
            'voicedata' => 'Fallin_For_You.mp3',
        ],

    ];
    DB::table('voicedatas')->insert($param);

    }
}
