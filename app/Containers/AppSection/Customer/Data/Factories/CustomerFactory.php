<?php

namespace App\Containers\AppSection\Customer\Data\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Containers\AppSection\Customer\Models\Customer;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "firstname" => $this->faker->firstName,
            "lastname" => $this->faker->lastName,
            "title" => $this->faker->title,
            "phone" => $this->faker->phoneNumber,
            "email" => $this->faker->email,
        ];
    }
}
