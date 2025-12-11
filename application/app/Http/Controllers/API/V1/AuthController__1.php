<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Response;

class AuthController__1 extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function getToken()
    {
        return response()->json(['token' => $this->authService->generateToken()->token], Response::HTTP_OK);
    }
}
