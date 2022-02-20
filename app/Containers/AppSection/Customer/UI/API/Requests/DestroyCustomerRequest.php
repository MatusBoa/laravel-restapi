<?php

namespace App\Containers\AppSection\Customer\UI\API\Requests;

use App\Ship\Requests\FormRequest;

/**
 * Class DestroyCustomerRequest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class DestroyCustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "customer_id" => ["required"],
        ];
    }
}
