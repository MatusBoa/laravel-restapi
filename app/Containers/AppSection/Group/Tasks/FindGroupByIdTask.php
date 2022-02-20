<?php

namespace App\Containers\AppSection\Group\Tasks;

use App\Containers\AppSection\Group\Models\Group;
use App\Containers\AppSection\Group\Data\Repositories\Contracts\GroupRepository;

/**
 * Class FindGroupByIdTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class FindGroupByIdTask
{
    public function __construct(
        protected GroupRepository $groupRepository,
    ) {}

    public function run(int $groupId): Group
    {
        return $this->groupRepository->find($groupId);
    }
}
