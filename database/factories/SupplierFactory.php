<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        // 'supplier_name' => $this->faker->name,
        // 'mobile_number' => $this->faker->unique()->mobileNumber,
        // 'address' => $this->faker->estate,
    ];
});
