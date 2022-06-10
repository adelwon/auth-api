<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTO\UserDTO;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
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

    public function getUserDTO(): UserDTO
    {
        return new UserDTO(
            $this->get('name'),
            $this->get('email'),
            $this->get('password')
        );
    }
}
