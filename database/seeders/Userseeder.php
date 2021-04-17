<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//Hash for encrypt the password
class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /* To create some dummy data inside database use seeder */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'abc',
            'email'=>'abc@gmail.com',
            'password'=>Hash::make('12345')
        ]);
    }
}
