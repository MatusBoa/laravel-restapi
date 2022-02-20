<?php

namespace App\Ship\Requests;

/**
 * Class FormRequest
 *
 * @author kotas <matus.koterba@gmail.com>
 */
class FormRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function all($keys = null): array
    {
        return array_replace_recursive(
            parent::all(),
            $this->route()->parameters()
        );

    }
}
