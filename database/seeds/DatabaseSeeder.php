<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \App\User::create([
            'name' => 'Luis',
            'email' => 'dev@dev.com',
            'password' => bcrypt('password'),
            'is_active' => 1
        ]);

        factory(\App\Modules\Event\Event::class, 100);
    }
}
