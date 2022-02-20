<?php

namespace App\Containers\AppSection\Customer\Actions\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Customer\Actions\GetAllCustomerGroupsAction;

/**
 * Class GetAllCustomerGroupsActionTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GetAllCustomerGroupsActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itThrowsExceptionIfCustomerWithGivenIdDoesNotExist(): void
    {
        $this->expectException(ModelNotFoundException::class);

        app(GetAllCustomerGroupsAction::class)->run(1);
    }

    /** @test */
    public function itReturnsCustomerGroups(): void
    {
        $customer = Customer::factory()->create();
        CustomerGroup::factory()->count(2)->create([
            "customer_id" => $customer->id,
        ]);

        $this->assertCount(2, app(GetAllCustomerGroupsAction::class)->run($customer->id));
    }
}
