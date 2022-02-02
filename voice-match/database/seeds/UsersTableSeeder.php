<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**Pana
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //データのクリア
    DB::table('users')->truncate();

    $param =[
        [
            'name' => 'taro',
            'email' => 'test@com',
            'email_verified_at' => "2021-07-14 12:05:00",
            'password' => bcrypt('password'),
            'max_f' => '123',
            'max_average_f' => '111',
        ],
        [
            'name' => 'jiro',
            'email' => 'test1@com',
            'email_verified_at' => "2021-07-14 12:05:00",
            'password' => bcrypt('password1'),
            'max_f' => '154',
            'max_average_f' => '121',
        ],
        [
            'name' => 'hanako',
            'email' => 'test2@com',
            'email_verified_at' => "2021-07-14 12:05:00",
            'password' => bcrypt('password2'),
            'max_f' => '165',
            'max_average_f' => '150',
        ]
    ];
    DB::table('users')->insert($param);
    }
}
