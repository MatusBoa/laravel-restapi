<?php

namespace App\Containers\AppSection\Customer\Data\Repositories;

use Illuminate\Support\Collection;
use App\Ship\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerGroupRepository as RepositoryContract;

/**
 * Class CustomerGroupRepository
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class CustomerGroupRepository implements RepositoryContract
{
    public function all(): Collection
    {
        return CustomerGroup::all();
    }

    public function find(int $id): Model
    {
        return CustomerGroup::query()
            ->where("id", $id)
            ->sole();
    }

    public function save(Model $model): void
    {
        $model->save();
    }

    public function delete(Model $model): void
    {
        $model->delete();
    }

    public function withRelation(array|string $relation): Repository
    {
        // not implemented

        return $this;
    }

    public function query(): Builder
    {
        return CustomerGroup::query();
    }
}
