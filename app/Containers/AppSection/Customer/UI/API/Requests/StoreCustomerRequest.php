<?php

namespace App\Containers\AppSection\Customer\UI\API\Requests;

use App\Ship\Requests\FormRequest;

/**
 * Class StoreCustomerRequest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class StoreCustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "firstname" => ["required"],
            "lastname" => ["required"],
            "title" => ["sometimes"],
            "phone" => ["required"],
            "email" => ["required"],
        ];
    }
}
