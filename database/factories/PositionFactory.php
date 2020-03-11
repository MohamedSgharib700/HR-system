<?php

use App\Models\Position;
use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(Position::class, function (Faker $faker) {
    $position = [
        [
            'name' => 'Junior',
            'active' => 1,
        ],
        [
            'name' => 'Mid Senior',
            'active' => 1,
        ],
        [
            'name' => 'Senior',
            'active' => 1,
        ],
        [
            'name' => 'Mid Team Leader',
            'active' => 1,
        ],
        [
            'name' => 'Team Leader',
            'active' => 1,
        ],
        [
            'name' => 'Internal Ship',
            'active' => 1,
        ],
        [
            'name' => 'CEO',
            'active' => 1,
        ],
        [
            'name' => 'CTO',
            'active' => 1,
        ]
    ];

    return $faker->randomElement($position);
});
