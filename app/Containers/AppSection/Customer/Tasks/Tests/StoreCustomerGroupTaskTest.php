<?php

namespace App\Containers\AppSection\Customer\Tasks\Tests;

use Tests\TestCase;
use App\Containers\AppSection\Group\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\StoreCustomerGroupTask;

/**
 * Class StoreCustomerGroupTaskTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class StoreCustomerGroupTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itStoresCustomerGroup(): void
    {
        $customer = Customer::factory()->create();
        $group = Group::factory()->create();

        app(StoreCustomerGroupTask::class)->run($customer, $group);

        $this->assertDatabaseCount("customer_groups", 1);
    }
}
