<?php

namespace App\Containers\AppSection\Customer\UI\API\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use App\Ship\Controllers\Controller;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Actions\StoreCustomerAction;
use App\Containers\AppSection\Customer\Actions\UpdateCustomerAction;
use App\Containers\AppSection\Customer\Actions\DeleteCustomerAction;
use App\Containers\AppSection\Customer\Actions\GetAllCustomersAction;
use App\Containers\AppSection\Customer\Actions\FindCustomerByIdAction;
use App\Containers\AppSection\Customer\UI\API\Requests\StoreCustomerRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\UpdateCustomerRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\DestroyCustomerRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\ShowCustomerRequest;

/**
 * Class CustomerController
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class CustomerController extends Controller
{
    public function index(): Collection
    {
        return app(GetAllCustomersAction::class)->run();
    }

    public function show(ShowCustomerRequest $request): Customer
    {
        return app(FindCustomerByIdAction::class)->run(
            $request->customer_id
        );
    }

    public function store(StoreCustomerRequest $request): Customer
    {
        return app(StoreCustomerAction::class)->run(
            $request->validated()
        );
    }

    public function update(UpdateCustomerRequest $request)
    {
        return app(UpdateCustomerAction::class)->run(
            $request->customer_id,
            $request->except("customer_id")
        );
    }

    public function destroy(DestroyCustomerRequest $request): Response
    {
        app(DeleteCustomerAction::class)->run($request->customer_id);

        return response()->noContent();
    }
}
