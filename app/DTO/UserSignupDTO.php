<?php

declare(strict_types=1);

namespace App\DTO;

class UserSignupDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    )
    {
    }
}
