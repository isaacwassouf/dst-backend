<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Hash;
use \Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * Check if a user exists by ID.
     *
     * @param int $id
     * @return void
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $validatedInput = $this->validateLogin($request->all());

        // check if the user exists in the database
        $user = User::where("email", $validatedInput["email"])->first();

        if (!$user) {
            throw new Exception("User not found.");
        }

        // verify that the password matches the hashed password in the database
        if (!Hash::check($user->password, $validatedInput["password"])) {
            throw new Exception("Invalid password.");
        }
    }

    /**
     * @throws ValidationException
     */
    private function validateLogin(array $input): array
    {
        return Validator::make($input, [
            "email" => ["required", "email"],
            "password" => ["required", "string"],
            "rememberMe" => ["boolean"],
        ])->validate();
    }


    /**
     * Check if a user exists by ID.
     *
     * @param int $id
     * @return void
     * @throws ValidationException
     */
    public function register(Request $request)
    {
        $validatedInput = $this->validateRegister($request->all());

        User::create([
            "email" => $validatedInput["email"],
            "password" => Hash::make($validatedInput["password"]),
        ]);
    }


    /**
     * @throws ValidationException
     */
    private function validateRegister(array $input): array
    {
        return Validator::make($input, [
            "email" => ["required", "email", "unique:users"],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();
    }


    public function logout(Request $request)
    {
    }

    public function rememberMe(Request $request)
    {
    }
}
