<?php

namespace App\Containers\AppSection\Customer\Actions;

use Illuminate\Support\Collection;
use App\Containers\AppSection\Customer\Tasks\FindCustomerByIdTask;
use App\Containers\AppSection\Customer\Tasks\GetAllCustomerGroupsTask;

/**
 * Class GetAllCustomerGroupsAction
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GetAllCustomerGroupsAction
{
    public function run(int $customerId): Collection
    {
        $customer = app(FindCustomerByIdTask::class)->run($customerId);

        return app(GetAllCustomerGroupsTask::class)->run($customer);
    }
}
