<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerRepository;

/**
 * Class FindCustomerByIdTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class FindCustomerByIdTask
{
    public function __construct(
        protected CustomerRepository $customerRepository,
    ) {}

    public function run(int $customerId): Customer
    {
        return $this->customerRepository->find($customerId);
    }
}
