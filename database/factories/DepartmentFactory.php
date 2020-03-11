<?php

use App\Models\Department;
use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    $department = [
        [
            'name' => 'Web Developer',
            'active' => 1,
        ],
        [
            'name' => 'IOS Developer',
            'active' => 1,
        ],
        [
            'name' => 'Android Developer',
            'active' => 1,
        ],
        [
            'name' => 'Testing',
            'active' => 1,
        ],
        [
            'name' => 'Web Designer',
            'active' => 1,
        ],
        [
            'name' => 'Call Center',
            'active' => 1,
        ],
        [
            'name' => 'SEO',
            'active' => 1,
        ],
        [
            'name' => 'Finance',
            'active' => 1,
        ],
        [
            'name' => 'HR',
            'active' => 1,
        ],
        [
            'name' => 'GM',
            'active' => 1,
        ]

    ];


    return $faker->randomElement($department);
});
