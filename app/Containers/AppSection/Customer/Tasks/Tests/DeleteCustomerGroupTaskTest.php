<?php

namespace App\Containers\AppSection\Customer\Tasks\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Customer\Tasks\DeleteCustomerGroupTask;

/**
 * Class DeleteCustomerGroupTaskTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class DeleteCustomerGroupTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itDeletesCustomerGroup(): void
    {
        $customerGroup = CustomerGroup::factory()->create();

        app(DeleteCustomerGroupTask::class)->run($customerGroup);

        $this->assertDatabaseCount("customer_groups", 0);
    }
}
