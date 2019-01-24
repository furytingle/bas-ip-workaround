<?php

namespace App\Http\Requests;

use App\Rules\PositionsRule;

class CreateUserRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'positions' => [
                new PositionsRule()
            ]
        ];
    }
}