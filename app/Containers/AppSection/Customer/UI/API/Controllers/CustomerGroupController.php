<?php

namespace App\Containers\AppSection\Customer\UI\API\Controllers;

use Illuminate\Support\Collection;
use App\Ship\Controllers\Controller;
use App\Containers\AppSection\Customer\Models\CustomerGroup;
use App\Containers\AppSection\Customer\Actions\StoreCustomerGroupAction;
use App\Containers\AppSection\Customer\Actions\DeleteCustomerGroupAction;
use App\Containers\AppSection\Customer\Actions\GetAllCustomerGroupsAction;
use App\Containers\AppSection\Customer\UI\API\Requests\IndexCustomerGroupRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\StoreCustomerGroupRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\DestroyCustomerGroupRequest;

/**
 * Class CustomerGroupController
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class CustomerGroupController extends Controller
{
    public function index(IndexCustomerGroupRequest $request): Collection
    {
        return app(GetAllCustomerGroupsAction::class)->run($request->customer_id);
    }

    public function store(StoreCustomerGroupRequest $request): CustomerGroup
    {
        return app(StoreCustomerGroupAction::class)->run($request->customer_id, $request->group_id);
    }

    public function destroy(DestroyCustomerGroupRequest $request)
    {
        app(DeleteCustomerGroupAction::class)->run($request->customer_id, $request->group_id);

        return response()->noContent();
    }
}
