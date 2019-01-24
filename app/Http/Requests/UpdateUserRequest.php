<?php

namespace App\Http\Requests;

use App\Rules\PositionsRule;

class UpdateUserRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'positions' => [
                new PositionsRule()
            ]
        ];
    }
}