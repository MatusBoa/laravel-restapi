<?php

namespace App\Containers\AppSection\Customer\Tasks\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Customer\Tasks\StoreCustomerTask;

/**
 * Class StoreCustomerTaskTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class StoreCustomerTaskTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function itStoresUser(): void
    {
        app(StoreCustomerTask::class)->run([
            "firstname" => $this->faker->firstName,
            "lastname" => $this->faker->lastName,
            "title" => $this->faker->title,
            "phone" => $this->faker->phoneNumber,
            "email" => $this->faker->email,
        ]);

        $this->assertDatabaseCount("customers", 1);
    }
}
