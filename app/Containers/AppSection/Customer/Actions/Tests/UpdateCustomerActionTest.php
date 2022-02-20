<?php

namespace App\Containers\AppSection\Customer\Actions\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Containers\AppSection\Customer\Actions\UpdateCustomerAction;

/**
 * Class UpdateCustomerActionTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class UpdateCustomerActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itThrowsExceptionIfCustomerWithGivenIdDoesNotExist(): void
    {
        $this->expectException(ModelNotFoundException::class);

        app(UpdateCustomerAction::class)->run(1, [
            "foo" => "bar",
        ]);
    }

    /** @test */
    public function itUpdatesCustomer(): void
    {
        $customer = Customer::factory()->create([
            "email" => "foo@bar.com"
        ]);

        Customer::factory()->create([
            "email" => "bar@foo.com"
        ]);

        app(UpdateCustomerAction::class)->run($customer->id, [
            "email" => "updated@bar.com"
        ]);

        $this->assertDatabaseMissing("customers", [
            "email" => "foo@bar.com",
        ]);

        $this->assertDatabaseHas("customers", [
            "email" => "bar@foo.com"
        ]);

        $this->assertDatabaseHas("customers", [
            "email" => "updated@bar.com",
        ]);
    }
}
