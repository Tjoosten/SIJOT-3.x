<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Sijot\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'theme'          => $faker->numberBetween(0, 1),
        'avatar'         => $faker->imageUrl(),
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Sijot\Theme::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->name,
        'class' => $faker->name
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Sijot\Lease::class, function (Faker\Generator $faker){
    return [
        'rental_status_id'  => $faker->numberBetween(0, 2),
        'end_date'          => $faker->date(),
        'start_date'        => $faker->date(),
        'email_address'     => $faker->email,
        'group_name'        => $faker->name,
        'phone_number'      => $faker->phoneNumber,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Sijot\RentalStatus::class, function (Faker\Generator $faker) {
    return [
        'name'          => $faker->name,
        'label_class'   => $faker->rgbCssColor,
        'table_class'   => $faker->rgbCssColor,
        'description'   => $faker->text(200)
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Spatie\Permission\Models\Permission::class, function (Faker\Generator $faker) {
    return ['name' => 'active'];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Chrisbjr\ApiGuard\Models\ApiKey::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(0, 2),
        'key'     => str_random(40),
        'level'   => 10,
        'ignore_limits' => false
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Spatie\Permission\Models\Role::class, function (Faker\Generator $faker) {
    return ['name' => $faker->word];
});