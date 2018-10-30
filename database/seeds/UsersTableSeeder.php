<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //pravimo lazne podatke,kreiramo 20 usera
        factory(\App\User::class,20)->create();
    }
}
