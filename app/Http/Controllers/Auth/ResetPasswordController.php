<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * ResetPasswordController constructor.
     * @param string|null $broker
     */
    public function __construct(private ?string $broker = null)
    {
        $this->broker = 'users';
    }
}
