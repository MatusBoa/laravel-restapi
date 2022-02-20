<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Containers\AppSection\Group\Models\Group;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Models\CustomerGroup;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Customer[] $customers */
        $customers = Customer::factory()->count(rand(10, 20))->create();
        $groups = Group::factory()->count(5)->create();

        foreach ($customers as $customer) {
            if (rand(1, 2) === 2) {
                continue;
            }

            foreach ($groups->random(rand(1, 5)) as $group) {
                CustomerGroup::factory()->create([
                    "customer_id" => $customer->id,
                    "group_id" => $group->id,
                ]);
            }
        }
    }
}
