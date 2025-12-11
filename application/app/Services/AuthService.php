<?php

namespace App\Services;

use App\Models\Token;

class AuthService
{
    private $length = 32;

    public function generateToken()
    {
        return Token::create([
            'token' => bin2hex(openssl_random_pseudo_bytes($this->length)),
        ]);
    }
}
