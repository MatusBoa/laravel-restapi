<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Group\Tasks\FindGroupByIdTask;
use App\Containers\AppSection\Customer\Tasks\FindCustomerByIdTask;
use App\Containers\AppSection\Customer\Tasks\FindCustomerGroupTask;
use App\Containers\AppSection\Customer\Tasks\DeleteCustomerGroupTask;

/**
 * Class DeleteCustomerGroupAction
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class DeleteCustomerGroupAction
{
    public function run(int $customerId, int $groupId): void
    {
        $customer = app(FindCustomerByIdTask::class)->run($customerId);
        $group = app(FindGroupByIdTask::class)->run($groupId);

        $customerGroup = app(FindCustomerGroupTask::class)->run($customer, $group);

        app(DeleteCustomerGroupTask::class)->run($customerGroup);
    }
}
