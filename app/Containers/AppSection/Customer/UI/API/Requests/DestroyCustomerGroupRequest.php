<?php

namespace App\Containers\AppSection\Customer\UI\API\Requests;

use App\Ship\Requests\FormRequest;

/**
 * Class DestroyCustomerGroupRequest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class DestroyCustomerGroupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "customer_id" => ["required"],
            "group_id" => ["required"],
        ];
    }
}
