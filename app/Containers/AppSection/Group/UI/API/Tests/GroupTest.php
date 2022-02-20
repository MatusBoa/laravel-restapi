<?php

namespace App\Containers\AppSection\Group\UI\API\Tests;

use Tests\TestCase;
use App\Containers\AppSection\Group\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class GroupTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GroupTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itShowsAllGroups(): void
    {
        Group::factory()->count(5)->create();

        $this->get("api/v1/groups")
            ->assertOk()
            ->assertJsonCount(5);
    }
}
