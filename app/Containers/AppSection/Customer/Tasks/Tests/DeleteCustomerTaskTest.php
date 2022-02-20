<?php

namespace App\Containers\AppSection\Customer\Tasks\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\DeleteCustomerTask;

/**
 * Class DeleteCustomerTaskTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class DeleteCustomerTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itDeletesCustomer(): void
    {
        $customer = Customer::factory()->create();

        app(DeleteCustomerTask::class)->run($customer);

        $this->assertDatabaseCount("customers", 0);
    }
}
