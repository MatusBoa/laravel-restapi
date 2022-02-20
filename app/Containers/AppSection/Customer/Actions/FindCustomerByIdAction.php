<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\FindCustomerByIdTask;

/**
 * Class FindCustomerByIdAction
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class FindCustomerByIdAction
{
    public function run(int $customerId): Customer
    {
        return app(FindCustomerByIdTask::class)->run($customerId);
    }
}
