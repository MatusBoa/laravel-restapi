<?php

namespace App\Containers\AppSection\Customer\Tasks\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\UpdateCustomerTask;

/**
 * Class UpdateCustomerTaskTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class UpdateCustomerTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itUpdatesCustomer(): void
    {
        $customer = Customer::factory()->create([
            "email" => "test@customer.com",
        ]);

        app(UpdateCustomerTask::class)->run($customer, [
            "email" => "updated@customer.com",
        ]);

        $this->assertDatabaseMissing("customers", [
            "email" => "test@customer.com",
        ]);

        $this->assertDatabaseHas("customers", [
            "email" => "updated@customer.com",
        ]);
    }
}
