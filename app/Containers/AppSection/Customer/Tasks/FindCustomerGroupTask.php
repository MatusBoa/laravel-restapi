<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Group\Models\Group;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerGroupRepository;

/**
 * Class FindCustomerGroupTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class FindCustomerGroupTask
{
    public function __construct(
        protected CustomerGroupRepository $customerGroupRepository,
    ) {}

    public function run(Customer $customer, Group $group): CustomerGroup
    {
        return $this->customerGroupRepository->query()
            ->where("customer_id", $customer->id)
            ->where("group_id", $group->id)
            ->sole();
    }
}
