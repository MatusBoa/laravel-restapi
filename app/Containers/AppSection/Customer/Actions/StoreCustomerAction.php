<?php

namespace App\Containers\AppSection\Customer\Actions;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\StoreCustomerTask;

/**
 * Class StoreCustomerAction
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class StoreCustomerAction
{
    public function run(array $attributes): Customer
    {
        return app(StoreCustomerTask::class)->run($attributes);
    }
}
