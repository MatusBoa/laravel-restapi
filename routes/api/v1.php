<?php

use Illuminate\Support\Facades\Route;
use App\Containers\AppSection\Group\UI\API\Controllers\GroupController;
use App\Containers\AppSection\Customer\UI\API\Controllers\CustomerController;
use App\Containers\AppSection\Customer\UI\API\Controllers\CustomerGroupController;

Route::get('/customers', [CustomerController::class, "index"]);
Route::post("/customers", [CustomerController::class, "store"]);
Route::get("/customers/{customer_id}", [CustomerController::class, "show"]);
Route::put("/customers/{customer_id}", [CustomerController::class, "update"]);
Route::delete("/customers/{customer_id}", [CustomerController::class, "destroy"]);

Route::get("/groups", [GroupController::class, "index"]);

Route::get("/customers/{customer_id}/groups", [CustomerGroupController::class, "index"]);
Route::post("/customers/{customer_id}/groups", [CustomerGroupController::class, "store"]);
Route::delete("/customers/{customer_id}/groups/{group_id}", [CustomerGroupController::class, "destroy"]);
