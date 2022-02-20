<?php

namespace App\Containers\AppSection\Customer\Data\Factories;

use App\Containers\AppSection\Group\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Models\CustomerGroup;

/**
 * Class CustomerGroupFactory
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class CustomerGroupFactory extends Factory
{
    protected $model = CustomerGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "customer_id" => Customer::factory(),
            "group_id" => Group::factory(),
        ];
    }
}
