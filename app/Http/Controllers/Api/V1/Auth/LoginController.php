<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginPostRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginPostRequest $request)
    {
        //
    }

    /**
     * Create user token
     *
     * @param User $user
     * @return string
     */
    private function createUserToken(User $user): string
    {
        return $user->createToken(\Hash::make($user->name) . \String::random(10))->plainTextToken;
    }
}
