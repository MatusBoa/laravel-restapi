<?php

namespace App\Containers\AppSection\Customer\Tasks\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Containers\AppSection\Customer\Tasks\FindCustomerByIdTask;

/**
 * Class FindCustomerByIdTaskTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class FindCustomerByIdTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itFindsCustomerIfExists(): void
    {
        $customer = Customer::factory()->create([
            "id" => 1,
        ]);

        $this->assertTrue($customer->is(
            app(FindCustomerByIdTask::class)->run(1)
        ));
    }

    /** @test */
    public function itThrowsExceptionIfUserDoesNotExist(): void
    {
        $this->expectException(ModelNotFoundException::class);

        app(FindCustomerByIdTask::class)->run(1);
    }
}
