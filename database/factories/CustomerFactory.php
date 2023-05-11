<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number'            => fake()->creditCardNumber,
            'expiryMonth'       => fake()->numberBetween(1, 12),
            'expiryYear'        => fake()->numberBetween(2022, 2025),
            'startMonth'        => null,
            'startYear'         => null,
            'issueNumber'       => null,
            'email'             => fake()->email,
            'birthday'          => Carbon::parse(fake()->dateTimeBetween('-50 years', '-18 years'))->format('Y-m-d H:i:s'),
            'gender'            => fake()->randomElement(['Male', 'Female', 'Other']),
            'billingTitle'      => null,
            'billingFirstName'  => fake()->firstName,
            'billingLastName'   => fake()->lastName,
            'billingCompany'    => null,
            'billingAddress1'   => fake()->streetAddress,
            'billingAddress2'   => null,
            'billingCity'       => fake()->city,
            'billingPostcode'   => fake()->postcode,
            'billingState'      => null,
            'billingCountry'    => fake()->countryCode,
            'billingPhone'      => fake()->phoneNumber,
            'billingFax'        => null,
            'shippingTitle'     => null,
            'shippingFirstName' => fake()->firstName,
            'shippingLastName'  => fake()->lastName,
            'shippingCompany'   => null,
            'shippingAddress1'  => fake()->streetAddress,
            'shippingAddress2'  => null,
            'shippingCity'      => fake()->city,
            'shippingPostcode'  => fake()->postcode,
            'shippingState'     => null,
            'shippingCountry'   => fake()->countryCode,
            'shippingPhone'     => fake()->phoneNumber,
            'shippingFax'       => null,
        ];
    }
}
