<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Class UserService
 * @package App\Service
 */
class UserService
{
    /**
     * @param Request $request
     * @return Model
     */
    public function create(Request $request): Model
    {
        return User::query()
            ->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'api_token' => Str::random(60),
            ]);
    }
}
