<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Utilizando factory creo 10 entradas de usuario en la BD de forma automatica
         factory(App\User::class)->times(40)->create();
    }
}
