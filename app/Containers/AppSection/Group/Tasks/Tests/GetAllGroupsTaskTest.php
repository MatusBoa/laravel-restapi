<?php

namespace App\Containers\AppSection\Group\Tasks\Tests;

use Tests\TestCase;
use App\Containers\AppSection\Group\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Containers\AppSection\Group\Tasks\GetAllGroupsTask;

/**
 * Class GetAllGroupsTaskTest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GetAllGroupsTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itReturnsAllGroups(): void
    {
        Group::factory()->count(4)->create();

        $this->assertCount(4, app(GetAllGroupsTask::class)->run());
    }
}
