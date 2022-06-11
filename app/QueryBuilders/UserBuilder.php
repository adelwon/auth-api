<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\DTO\UserSignupDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

/**
 * @method User|null first($columns = ['*'])()
 */
class UserBuilder extends Builder
{
    public function createFromDTO(UserSignupDTO $userSignupDTO): User
    {
        $user = new User();
        $user->name = $userSignupDTO->name;
        $user->email = $userSignupDTO->email;
        $password = $userSignupDTO->password;
        $user->password = Hash::make($password);
        $user->save();

        return $user;
    }
}
