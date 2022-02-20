<?php

namespace App\Containers\AppSection\Group\Data\Repositories;

use Illuminate\Support\Collection;
use App\Ship\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Containers\AppSection\Group\Models\Group;
use App\Containers\AppSection\Group\Data\Repositories\Contracts\GroupRepository as RepositoryContract;

/**
 * Class GroupRepository
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class GroupRepository implements RepositoryContract
{
    protected array $relations = [];

    public function all(): Collection
    {
        return Group::all();
    }

    public function find(int $id): Model
    {
        return Group::query()
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
        $this->relations = (array) $relation;

        return $this;
    }

    public function query(): Builder
    {
        return Group::query();
    }
}
