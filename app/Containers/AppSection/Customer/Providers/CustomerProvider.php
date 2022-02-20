<?php

namespace App\Containers\AppSection\Customer\Providers;

use Illuminate\Support\ServiceProvider;
use App\Containers\AppSection\Customer\Data\Repositories\CustomerRepository;
use App\Containers\AppSection\Customer\Data\Repositories\CustomerGroupRepository;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerGroupRepository as CustomGroupRepositoryContract;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerRepository as CustomerRepositoryContract;

/**
 * Class CustomerProvider
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class CustomerProvider extends ServiceProvider
{
    public array $bindings = [
        CustomerRepositoryContract::class => CustomerRepository::class,
        CustomGroupRepositoryContract::class => CustomerGroupRepository::class,
    ];

    public function register()
    {
        //
    }

    public function boot()
    {
        //
    }
}
