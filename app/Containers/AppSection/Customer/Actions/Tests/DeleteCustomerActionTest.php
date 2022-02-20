<?php

namespace App\Containers\AppSection\Customer\Actions\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Containers\AppSection\Customer\Actions\DeleteCustomerAction;

/**
 * Class DeleteCustomerActionTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class DeleteCustomerActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itThrowsExceptionIfGivenCustomerIdDoesNotExist(): void
    {
        $this->expectException(ModelNotFoundException::class);

        app(DeleteCustomerAction::class)->run(1);
    }

    /** @test */
    public function itDeletesCustomer(): void
    {
        $customer = Customer::factory()->create();
        Customer::factory()->create();

        $this->assertDatabaseCount("customers", 2);

        app(DeleteCustomerAction::class)->run($customer->id);

        $this->assertDatabaseCount("customers", 1);
    }
}
