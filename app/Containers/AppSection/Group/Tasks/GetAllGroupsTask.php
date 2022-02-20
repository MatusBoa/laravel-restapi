<?php

namespace App\Containers\AppSection\Group\Tasks;

use Illuminate\Support\Collection;
use App\Containers\AppSection\Group\Data\Repositories\Contracts\GroupRepository;

/**
 * Class GetAllGroupsTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GetAllGroupsTask
{
    public function __construct(
        protected GroupRepository $groupRepository,
    ) {}

    public function run(): Collection
    {
        return $this->groupRepository->all();
    }
}
