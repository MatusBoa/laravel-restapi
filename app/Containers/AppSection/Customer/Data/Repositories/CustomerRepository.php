<?php

namespace App\Containers\AppSection\Customer\Data\Repositories;

use Illuminate\Support\Collection;
use App\Ship\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Data\Repositories\Contracts\CustomerRepository as RepositoryContract;

/**
 * Class CustomerRepository
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class CustomerRepository implements RepositoryContract
{
    protected array $relations = [];

    public function find(int $id): Model
    {
        return Customer::query()
            ->with($this->relations)
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

    public function all(): Collection
    {
        return Customer::with($this->relations)->get();
    }

    public function withRelation(array|string $relation): Repository
    {
        $this->relations = (array) $relation;

        return $this;
    }

    public function query(): Builder
    {
        return Customer::query();
    }
}
