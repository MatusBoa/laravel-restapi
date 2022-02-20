<?php

namespace App\Containers\AppSection\Customer\Tasks\Tests;

use Tests\TestCase;
use App\Containers\AppSection\Group\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Customer\Tasks\FindCustomerGroupTask;

/**
 * Class FindCustomerGroupTaskTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class FindCustomerGroupTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itThrowsExceptionIfRelationDoesNotExist(): void
    {
        $this->expectException(ModelNotFoundException::class);

        app(FindCustomerGroupTask::class)->run(
            Customer::factory()->create(),
            Group::factory()->create(),
        );
    }

    /** @test */
    public function itReturnsCustomerGroup(): void
    {
        $customer = Customer::factory()->create();
        $group = Group::factory()->create();
        $customerGroup = CustomerGroup::factory()->create([
            "customer_id" => $customer->id,
            "group_id" => $group->id,
        ]);

        $this->assertTrue($customerGroup->is(
            app(FindCustomerGroupTask::class)->run(
                $customer,
                $group,
            )
        ));
    }
}
