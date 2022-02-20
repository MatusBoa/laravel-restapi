<?php

namespace App\Containers\AppSection\Customer\Tasks;

use Illuminate\Support\Collection;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerRepository;

/**
 * Class GetAllCustomersTask
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GetAllCustomersTask
{
    public function __construct(
        protected CustomerRepository $customerRepository
    ) {}

    public function run(): Collection
    {
       return $this->customerRepository->all();
    }
}
