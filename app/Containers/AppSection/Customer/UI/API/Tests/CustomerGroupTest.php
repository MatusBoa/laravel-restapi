<?php

namespace App\Containers\AppSection\Customer\UI\API\Tests;

use Tests\TestCase;
use App\Containers\AppSection\Group\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Models\CustomerGroup;

/**
 * Class CustomerGroupTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class CustomerGroupTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itReturnsNotFoundIfCustomerDoesNotExistWhenTryingToShowGroups(): void
    {
        $this->get("api/v1/customers/1/groups")
            ->assertNotFound();
    }

    /** @test */
    public function itShowsCustomerGroups(): void
    {
        $customer = Customer::factory()->create();
        $group = Group::factory()->create();

        CustomerGroup::factory()->create([
            "customer_id" => $customer->id,
            "group_id" => $group->id,
        ]);

        $this->get("api/v1/customers/{$customer->id}/groups")
            ->assertOk()
            ->assertJsonFragment($group->toArray());
    }

    /** @test */
    public function itReturnNotFoundIsCustomerOrGroupDoesNotExistWhenTryingToStore(): void
    {
        $customer = Customer::factory()->create();
        $group = Group::factory()->create();

        $this->post("api/v1/customers/2/groups", ["group_id" => "5"])
            ->assertNotFound();

        $this->assertDatabaseCount("customer_groups", 0);

        $this->post("api/v1/customers/{$customer->id}/groups", ["group_id" => "5"])
            ->assertNotFound();

        $this->assertDatabaseCount("customer_groups", 0);

        $this->post("api/v1/customers/44/groups", ["group_id" => $group->id])
            ->assertNotFound();

        $this->assertDatabaseCount("customer_groups", 0);
    }

    /** @test */
    public function itStoresCustomerGroup(): void
    {
        $customer = Customer::factory()->create();
        $group = Group::factory()->create();

        $this->post("api/v1/customers/{$customer->id}/groups", ["group_id" => $group->id])
            ->assertCreated();

        $this->assertDatabaseCount("customer_groups", 1);
    }

    /** @test */
    public function itReturnsNotFoundIfCustomerDoesNotExistWhenTryingToDelete(): void
    {
        $group = Group::factory()->create();

        $this->delete("api/v1/customers/1/groups/{$group->id}")
            ->assertNotFound();
    }

    /** @test */
    public function itReturnsNotFoundIfGroupDoesNotExistWhenTryingToDelete(): void
    {
        $customer = Customer::factory()->create();

        $this->delete("api/v1/customers/{$customer->id}/groups/1")
            ->assertNotFound();
    }

    /** @test */
    public function itReturnsNotFoundIfRelationDoesNotExistWhenTryingToDelete(): void
    {
        $customer = Customer::factory()->create();
        $group = Group::factory()->create();

        $this->delete("api/v1/customers/{$customer->id}/groups/{$group->id}")
            ->assertNotFound();
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

        $this->delete("api/v1/customers/{$customer->id}/groups/{$group->id}")
            ->assertNoContent();

        $this->assertDatabaseCount("customer_groups", 0);
    }
}
