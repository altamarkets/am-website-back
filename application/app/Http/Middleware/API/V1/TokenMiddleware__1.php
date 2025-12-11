<?php

namespace App\Http\Middleware\API\V1;

use App\Exceptions\ForbiddenException;
use App\Models\Token;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class TokenMiddleware__1
{
    public function handle(Request $request, Closure $next): mixed
    {
        if ($request->bearerToken()) {
            if ($token = Token::whereToken($request->bearerToken())->first()) {
                Config::set('token', $token);
                return $next($request);
            }
        }

        throw new ForbiddenException('token is not valid.');
    }
}
