<?php

namespace App\Containers\AppSection\Group\UI\API\Controllers;

use Illuminate\Support\Collection;
use App\Ship\Controllers\Controller;
use App\Containers\AppSection\Group\Actions\GetAllGroupsAction;

/**
 * Class GroupController
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GroupController extends Controller
{
    public function index(): Collection
    {
        return app(GetAllGroupsAction::class)->run();
    }
}
