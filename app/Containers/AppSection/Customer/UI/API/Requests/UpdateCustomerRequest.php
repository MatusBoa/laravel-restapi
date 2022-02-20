<?php

namespace App\Containers\AppSection\Customer\UI\API\Requests;

use App\Ship\Requests\FormRequest;

/**
 * Class UpdateCustomerRequest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class UpdateCustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "customer_id" => ["required"],
            "firstname" => ["sometimes"],
            "lastname" => ["sometimes"],
            "title" => ["sometimes"],
            "phone" => ["sometimes"],
            "email" => ["sometimes"],
        ];
    }
}
