<?php

namespace App\Containers\AppSection\Group\Providers;

use Illuminate\Support\ServiceProvider;
use App\Containers\AppSection\Group\Data\Repositories\GroupRepository;
use App\Containers\AppSection\Group\Data\Repositories\Contracts\GroupRepository as GroupRepositoryContract;

/**
 * Class GroupProvider
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GroupProvider extends ServiceProvider
{
    public array $bindings = [
        GroupRepositoryContract::class => GroupRepository::class,
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
