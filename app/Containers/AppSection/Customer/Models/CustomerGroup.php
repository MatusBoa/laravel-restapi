<?php

namespace App\Containers\AppSection\Customer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Containers\AppSection\Customer\Data\Factories\CustomerGroupFactory;

/**
 * Class CustomerGroup
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class CustomerGroup extends Model
{
    use HasFactory;

    protected $table = "customer_groups";

    protected $fillable = [
        "customer_id",
        "group_id",
    ];

    protected static function newFactory()
    {
        return CustomerGroupFactory::new();
    }
}
