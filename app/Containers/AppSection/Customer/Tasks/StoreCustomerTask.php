<?php

namespace App\Containers\AppSection\Customer\Tasks;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerRepository;

/**
 * Class StoreCustomerTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class StoreCustomerTask
{
    public function __construct(
        protected CustomerRepository $customerRepository
    ) {}

    public function run(array $attributes): Customer
    {
        $customer = new Customer($attributes);

        $this->customerRepository->save($customer);

        return $customer;
    }
}
