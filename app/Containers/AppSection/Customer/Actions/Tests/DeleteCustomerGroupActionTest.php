<?php

namespace App\Containers\AppSection\Customer\Actions\Tests;

use Tests\TestCase;
use App\Containers\AppSection\Group\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Customer\Actions\DeleteCustomerGroupAction;

/**
 * Class DeleteCustomerGroupActionTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class DeleteCustomerGroupActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itThrowsExceptionIfCustomerDoesNotExist(): void
    {
        $group = Group::factory()->create();

        $this->expectException(ModelNotFoundException::class);

        app(DeleteCustomerGroupAction::class)->run(1, $group->id);
    }

    /** @test */
    public function itThrowsExceptionIfGroupDoesNotExist(): void
    {
        $customer = Customer::factory()->create();

        $this->expectException(ModelNotFoundException::class);

        app(DeleteCustomerGroupAction::class)->run($customer->id, 1);
    }

    /** @test */
    public function itThrowsExceptionIfRelationDoesNotExist(): void
    {
        $customer = Customer::factory()->create();
        $group = Group::factory()->create();

        $this->expectException(ModelNotFoundException::class);

        app(DeleteCustomerGroupAction::class)->run($customer->id, $group->id);
    }

    /** @test */
    public function itDeletesRelation(): void
    {
        $customer = Customer::factory()->create();
        $group = Group::factory()->create();

        CustomerGroup::factory()->create([
            "customer_id" => $customer->id,
            "group_id" => $group->id,
        ]);

        app(DeleteCustomerGroupAction::class)->run($customer->id, $group->id);

        $this->assertDatabaseCount("customer_groups", 0);
    }
}
