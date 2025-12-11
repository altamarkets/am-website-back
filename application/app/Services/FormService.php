<?php

namespace App\Services;

use App\Models\FormSubmit;
use App\Models\Token;
use Illuminate\Support\Facades\Config;

class FormService
{
    public function submit(string $ip, array $data)
    {
        FormSubmit::updateOrCreate(
            ['client_ip' => $ip],
            ['payload' => json_encode($data)]
        );
        Token::whereUuid(Config::get('token')->uuid)->delete();
    }
}
