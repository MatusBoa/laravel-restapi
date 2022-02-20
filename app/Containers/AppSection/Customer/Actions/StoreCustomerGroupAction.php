<?php

namespace App\Containers\AppSection\Customer\Actions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Group\Tasks\FindGroupByIdTask;
use App\Containers\AppSection\Customer\Tasks\FindCustomerByIdTask;
use App\Containers\AppSection\Customer\Tasks\FindCustomerGroupTask;
use App\Containers\AppSection\Customer\Tasks\StoreCustomerGroupTask;

/**
 * Class StoreCustomerGroupAction
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class StoreCustomerGroupAction
{
    public function run(int $customerId, int $groupId): CustomerGroup
    {
        $customer = app(FindCustomerByIdTask::class)->run($customerId);
        $group = app(FindGroupByIdTask::class)->run($groupId);

        try {
            return app(FindCustomerGroupTask::class)->run($customer, $group);
        } catch (ModelNotFoundException) {
            return app(StoreCustomerGroupTask::class)->run($customer, $group);
        }
    }
}
