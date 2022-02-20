<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\UpdateCustomerTask;
use App\Containers\AppSection\Customer\Tasks\FindCustomerByIdTask;

/**
 * Class UpdateCustomerAction
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class UpdateCustomerAction
{
    public function run(int $customerId, array $attributes): Customer
    {
        $customer = app(FindCustomerByIdTask::class)->run($customerId);

        return app(UpdateCustomerTask::class)->run($customer, $attributes);
    }
}
