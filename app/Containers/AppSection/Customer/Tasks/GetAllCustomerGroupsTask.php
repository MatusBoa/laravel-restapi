<?php

namespace App\Containers\AppSection\Customer\Tasks;

use Illuminate\Support\Collection;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerRepository;

/**
 * Class GetAllCustomerGroupsTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GetAllCustomerGroupsTask
{
    public function __construct(
        protected CustomerRepository $customerRepository,
    ) {}

    public function run(Customer $customer): Collection
    {
        $customer = $this->customerRepository
            ->withRelation("groups")
            ->find($customer->id);

        return $customer->groups;
    }
}
