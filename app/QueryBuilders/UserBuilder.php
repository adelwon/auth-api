<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\User;
use App\DTO\UserDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

/**
 * @method User|null first($columns = ['*'])()
 */
class UserBuilder extends Builder
{
    public function createFromDTO(UserDTO $userDTO): User
    {
        $user = new User();
        $user->name = $userDTO->name;
        $user->email = $userDTO->email;
        $password = $userDTO->password;
        $user->password = Hash::make($password);
        $user->save();

        return $user;
    }
}
