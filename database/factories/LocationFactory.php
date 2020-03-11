<?php

use App\Models\Location;
use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    $arabicFaker = Factory::create('ar_SA');
    $locations = Location::whereRaw('(`_lft`+1)', '`_rgt`')->get();
    $location = [
        'active' => $faker->boolean,
        'parent_id' => $locations->isEmpty() ? null : $faker->randomElement($locations)->id,
        'name' => $faker->city,
    ];

    return $location;
});
