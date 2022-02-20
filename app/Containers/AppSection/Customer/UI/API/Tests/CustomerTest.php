<?php

namespace App\Containers\AppSection\Customer\UI\API\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;

/**
 * Class CustomerTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itShowsAllCustomers(): void
    {
        Customer::factory()->count(4)->create();

        $this->get("api/v1/customers")
            ->assertOk()
            ->assertJsonCount(4);
    }

    /** @test */
    public function itReturnsNotFoundIfGivenCustomerIdDoesNotExistWhenTryingToShow(): void
    {
        $this->get("api/v1/customers/1")
            ->assertNotFound();
    }

    /** @test */
    public function itShowsSpecificCustomer(): void
    {
        $customer = Customer::factory()->create();

        $this->get("api/v1/customers/{$customer->id}")
            ->assertOk()
            ->assertExactJson($customer->toArray());
    }

    /** @test */
    public function itStoresAndShowsCustomer(): void
    {
        $data = Customer::factory()->make();

        $this->post("api/v1/customers", $data->toArray())
            ->assertCreated()
            ->assertJsonFragment($data->toArray());

        $this->assertDatabaseCount("customers", 1);
    }

    /** @test */
    public function itReturnsNotFoundIfGivenCustomerIdDoesNotExistWhenTryingToUpdate(): void
    {
        $data = Customer::factory()->make();

        $this->put("api/v1/customers/1", $data->toArray())
            ->assertNotFound();
    }

    /** @test */
    public function itUpdatesCustomer(): void
    {
        $customer = Customer::factory()->create();

        $this->put("api/v1/customers/{$customer->id}", [
            "email" => "foo@bar.com",
        ])->assertOk()->assertJsonFragment([
            "email" => "foo@bar.com",
        ]);
    }

    /** @test */
    public function itReturnsNotFoundIfGivenCustomerIdDoesNotExistWhenTryingToDelete(): void
    {
        $this->delete("api/v1/customers/1")
            ->assertNotFound();
    }

    /** @test */
    public function itDeletesCustomer(): void
    {
        $customer = Customer::factory()->create();

        $this->delete("api/v1/customers/{$customer->id}")
            ->assertNoContent();

        $this->assertDatabaseCount("customers", 0);
    }
}
