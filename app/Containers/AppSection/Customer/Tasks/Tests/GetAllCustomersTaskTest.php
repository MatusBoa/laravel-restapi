<?php

namespace App\Containers\AppSection\Customer\Tasks\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\GetAllCustomersTask;

/**
 * Class GetAllCustomersTaskTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GetAllCustomersTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itReturnsAllCustomers(): void
    {
        Customer::factory()->count(3)->create();

        $this->assertCount(3, app(GetAllCustomersTask::class)->run());
    }
}
