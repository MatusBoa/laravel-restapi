<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerRepository;

/**
 * Class DeleteCustomerTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class DeleteCustomerTask
{
    public function __construct(
        protected CustomerRepository $customerRepository,
    ) {}

    public function run(Customer $customer): void
    {
        $this->customerRepository->delete($customer);
    }
}
