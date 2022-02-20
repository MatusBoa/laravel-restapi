<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Tasks\GetAllCustomersTask;

/**
 * Class GetAllCustomersAction
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GetAllCustomersAction
{
    public function run()
    {
        return app(GetAllCustomersTask::class)->run();
    }
}
