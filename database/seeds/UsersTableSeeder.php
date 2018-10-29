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
      App\User::create([
        'name' => 'Matias Bravo',
        'email' => 'admin@gmail.com',
        'password' => bcrypt(123456)
      ]);
        factory(App\User::class, 19)->create();
    }
}
