<?php

namespace App\Containers\AppSection\Customer\UI\API\Requests;

use App\Ship\Requests\FormRequest;

/**
 * Class IndexAllCustomerGroupRequest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class IndexCustomerGroupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "customer_id" => ["required"],
        ];
    }
}
