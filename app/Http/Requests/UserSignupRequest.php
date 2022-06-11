<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTO\UserSignupDTO;
use Illuminate\Foundation\Http\FormRequest;

class UserSignupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'unique:users',
                'email',
                'string',
                'max:255'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed'
            ]
        ];
    }

    public function getUserSignupDTO(): UserSignupDTO
    {
        return new UserSignupDTO(
            $this->get('name'),
            $this->get('email'),
            $this->get('password')
        );
    }
}
