<?php

namespace App\Containers\AppSection\Customer\Data\Repositories\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Customer\Tasks\GetAllCustomersTask;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerRepository;

/**
 * Class CustomerRepositoryTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class CustomerRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function getRepository(): CustomerRepository
    {
        return app(CustomerRepository::class);
    }

    /** @test */
    public function itReturnAllCustomers(): void
    {
        Customer::factory()->count(2)->create();

        $this->assertCount(2, $this->getRepository()->all());

        Customer::factory()->count(2)->create();

        $this->assertCount(4, $this->getRepository()->all());
    }

    /** @test */
    public function itFindsCustomerById(): void
    {
        $customer = Customer::factory()->create([
            "id" => 1,
        ]);

        $this->assertTrue(
            $this->getRepository()->find(1)
            ->is($customer)
        );
    }

    /** @test */
    public function itCreatesNewCustomer(): void
    {
        $this->assertDatabaseCount("customers", 0);

        $customer = (new Customer())->fill([
            "firstname" => $this->faker->firstName,
            "lastname" => $this->faker->lastName,
            "title" => $this->faker->title,
            "phone" => $this->faker->phoneNumber,
            "email" => "test@user.com",
        ]);

        $this->getRepository()->save($customer);

        $this->assertDatabaseCount("customers", 1);
        $this->assertDatabaseHas("customers", [
            "email" => "test@user.com",
        ]);
    }

    /** @test */
    public function itUpdatesCustomer(): void
    {
        $customer = Customer::factory()->create([
            "email" => "test@user.com",
        ]);

        $customer->email = "updated@user.com";

        $this->getRepository()->save($customer);

        $this->assertDatabaseMissing("customers", [
            "email" => "test@user.com",
        ]);
        $this->assertDatabaseHas("customers", [
            "email" => "updated@user.com",
        ]);
    }

    /** @test */
    public function itDeletesCustomer(): void
    {
        $customer = Customer::factory()->create();

        $this->getRepository()->delete($customer);

        $this->assertDatabaseCount("customers", 0);
    }

    /** @test */
    public function itReturnsCustomerGroups(): void
    {
        $customer = Customer::factory()->create();
        CustomerGroup::factory()->count(3)->create([
            "customer_id" => $customer->id,
        ]);

        $fetchedCustomer = $this->getRepository()->withRelation("groups")->find($customer->id);

        $this->assertCount(3, $fetchedCustomer->groups);
    }
}
