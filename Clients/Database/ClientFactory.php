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

use Faker\Generator;

$countries = app(\App\Countries\Contracts\Repositories\CountryRepositoryInterface::class);

$factory->define(\App\Clients\Models\Client::class, function (
    Generator $faker
) use ($countries) {
        return [
            'type_id' => function() {
                return \App\Clients\Services\ClientType::getTypes()
                    ->random();
            },
            'name' => $faker->company,
            'code' => $faker->companySuffix,
            'description' => $faker->text(),
            'telephone' => $faker->phoneNumber,
            'email' => $faker->companyEmail,
            'street' => $faker->streetAddress,
            'county' => $faker->city,
            'city' => $faker->city,
            'postcode' => $faker->postcode,
            'country' => $countries->get()->random()->getCode()
        ];
});
