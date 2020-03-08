<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    static $seed =0;
    $faker->seed($seed++);
    return [
        'name'=>$faker->company,
        'phone'=>$faker->phoneNumber,
    ];
});
