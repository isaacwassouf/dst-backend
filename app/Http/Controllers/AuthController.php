<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use \Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {

        try {
            $this->authService->login($request);
            return response()->json([
                "message" => "Hello User you are logged as TestUser",
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
            ], 422);
        }

    }

    public function register(Request $request)
    {
        try {
            $this->authService->register($request);

            return response()->json([
                "message" => "register successful.",
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
            ], 422);
        }
    }

    public function logout(Request $request)
    {
        try {
            $this->authService->logout($request);

            return response()->json([
                "message" => "logut successful.",
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
            ], 422);
        }
    }


    public function rememberMe(Request $request)
    {
        try {
            $this->authService->rememberMe($request);

            return response()->json([
                "message" => "logut successful.",
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
            ], 422);
        }
    }
}