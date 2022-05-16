<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

/**
 * Class SignInController
 * @package App\Http\Controllers\Auth
 */
class SignInController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function signUp(Request $request): JsonResponse
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', Password::defaults()],
        ]);

        $user = User::query()->firstWhere('email', $request->email);

        return $user && Hash::check($request->password, $user->password)
            ? response()->json(['api_token' => $user->api_token])
            : response()->json([], 401);
    }
}
