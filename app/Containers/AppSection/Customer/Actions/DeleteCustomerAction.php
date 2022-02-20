<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Tasks\DeleteCustomerTask;
use App\Containers\AppSection\Customer\Tasks\FindCustomerByIdTask;

/**
 * Class DeleteCustomerAction
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class DeleteCustomerAction
{
    public function run(int $customerId): void
    {
        $customer = app(FindCustomerByIdTask::class)->run($customerId);

        app(DeleteCustomerTask::class)->run($customer);
    }
}
