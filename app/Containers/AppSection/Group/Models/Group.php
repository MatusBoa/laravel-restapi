<?php

namespace App\Containers\AppSection\Group\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Containers\AppSection\Group\Data\Factories\GroupFactory;

/**
 * Class Group
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class Group extends Model
{
    use HasFactory;

    protected $table = "groups";

    protected $fillable = [
        "name",
        "description",
    ];

    protected static function newFactory()
    {
        return GroupFactory::new();
    }
}
