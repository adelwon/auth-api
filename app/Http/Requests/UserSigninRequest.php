<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSigninRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'string',
                'max:255'
            ],
            'password' => [
                'required',
                'string',
                'min:8'
            ]
        ];
    }
}
