<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modules\Event\Event;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'is_active'     => 1
    ];
});

$factory->define(Event::class, function (Faker $faker) {

    $start_date = \Carbon\Carbon::now()->addDays($faker->randomElement([1,2,3,4,5,6,7,8,9]));
    $end_date = $start_date->copy()->addDays($faker->randomElement([1,2,3,4,5,6,7,8,9]));
    $title = $faker->sentence(5);
    return [
        'title'         => $title,
        'description'   => $faker->paragraph(5),
        'address'       => $faker->address,
        'lat'           => $faker->latitude,
        'long'          => $faker->longitude,
        'start_date'    => $start_date->format('Y-m-d'),
        'end_date'      => $end_date->format('Y-m-d'),
        'user_id'       => factory(User::class)->create()->id,
        'slug'          => Illuminate\Support\Str::slug($title) . '-' . uniqid(time()),
    ];
});
