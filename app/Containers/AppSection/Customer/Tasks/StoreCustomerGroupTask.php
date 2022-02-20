<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Group\Models\Group;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerGroupRepository;

/**
 * Class StoreCustomerGroupTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class StoreCustomerGroupTask
{
    public function __construct(
        protected CustomerGroupRepository $customerGroupRepository,
    ) {}

    public function run(Customer $customer, Group $group): CustomerGroup
    {
        $customerGroup = new CustomerGroup([
            "customer_id" => $customer->id,
            "group_id" => $group->id,
        ]);

        $this->customerGroupRepository->save($customerGroup);

        return $customerGroup;
    }
}
