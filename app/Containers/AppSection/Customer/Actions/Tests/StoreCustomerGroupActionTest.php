<?php

namespace App\Containers\AppSection\Customer\Actions\Tests;

use Tests\TestCase;
use App\Containers\AppSection\Group\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Customer\Actions\StoreCustomerGroupAction;

/**
 * Class StoreCustomerGroupActionTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class StoreCustomerGroupActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itThrowsExceptionIfCustomerDoesNotExist(): void
    {
        $this->expectException(ModelNotFoundException::class);

        $group = Group::factory()->create();

        app(StoreCustomerGroupAction::class)->run(1, $group->id);
    }

    /** @test */
    public function itThrowsExceptionIfGroupDoesNotExist(): void
    {
        $this->expectException(ModelNotFoundException::class);

        $customer = Customer::factory()->create();

        app(StoreCustomerGroupAction::class)->run($customer->id, 1);
    }

    /** @test */
    public function itDoesNotStoreDuplicatedRelation(): void
    {
        $customer = Customer::factory()->create();
        $group = Group::factory()->create();

        CustomerGroup::factory()->create([
            "customer_id" => $customer->id,
            "group_id" => $group->id,
        ]);

        app(StoreCustomerGroupAction::class)->run($customer->id, $group->id);

        $this->assertDatabaseCount("customer_groups", 1);
    }

    /** @test */
    public function itStoresRelation(): void
    {
        $customer = Customer::factory()->create();
        $group = Group::factory()->create();

        app(StoreCustomerGroupAction::class)->run($customer->id, $group->id);

        $this->assertDatabaseCount("customer_groups", 1);
    }
}
