<?php

namespace App\Ship\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Interface Repository
 *
 * @author kotas <matus.koterba@gmail.com>
 */
interface Repository
{
    public function all(): Collection;
    public function find(int $id): Model;
    public function save(Model $model): void;
    public function delete(Model $model): void;
    public function withRelation(string|array $relation): Repository;
    public function query(): Builder;
}
