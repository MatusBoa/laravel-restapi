<?php

namespace App\Containers\AppSection\Customer\Tasks\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Customer\Tasks\GetAllCustomerGroupsTask;

/**
 * Class GetAllCustomerGroupsTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GetAllCustomerGroupsTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itReturnsAllCustomerGroups(): void
    {
        $customer = Customer::factory()->create();
        CustomerGroup::factory()->count(7)->create([
            "customer_id" => $customer->id,
        ]);

        $this->assertCount(7, app(GetAllCustomerGroupsTask::class)->run($customer));
    }
}
