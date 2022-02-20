<?php

namespace App\Containers\AppSection\Customer\Models;

use Illuminate\Database\Eloquent\Model;
use App\Containers\AppSection\Group\Models\Group;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Containers\AppSection\Customer\Data\Factories\CustomerFactory;

/**
 * Class Customer
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";

    protected $fillable = [
        "firstname",
        "lastname",
        "title",
        "phone",
        "email",
    ];

    protected static function newFactory()
    {
        return CustomerFactory::new();
    }

    public function groups(): HasManyThrough
    {
        return $this->hasManyThrough(
            Group::class,
            CustomerGroup::class,
            "customer_id",
            "id",
            "id",
            "group_id",
        );
    }
}
