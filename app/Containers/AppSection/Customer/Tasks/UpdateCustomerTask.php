<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerRepository;

/**
 * Class UpdateCustomerTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class UpdateCustomerTask
{
    public function __construct(
        protected CustomerRepository $customerRepository,
    ) {}

    public function run(Customer $customer, array $attributes): Customer
    {
        $customer->fill($attributes);

        $this->customerRepository->save($customer);

        return $customer;
    }
}
