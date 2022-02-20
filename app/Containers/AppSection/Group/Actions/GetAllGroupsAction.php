<?php

namespace App\Containers\AppSection\Group\Actions;

use Illuminate\Support\Collection;
use App\Containers\AppSection\Group\Tasks\GetAllGroupsTask;

/**
 * Class GetAllGroupsAction
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GetAllGroupsAction
{
    public function run(): Collection
    {
        return app(GetAllGroupsTask::class)->run();
    }
}
