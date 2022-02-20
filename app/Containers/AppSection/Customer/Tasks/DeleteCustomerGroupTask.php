<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerGroupRepository;

/**
 * Class DeleteCustomerGroupTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class DeleteCustomerGroupTask
{
    public function __construct(
        protected CustomerGroupRepository $customerGroupRepository,
    ) {}

    public function run(CustomerGroup $customerGroup): void
    {
        $this->customerGroupRepository->delete($customerGroup);
    }
}
