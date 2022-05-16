<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\SendsPasswordResetEmails;

/**
 * Class RequestPasswordController
 * @package App\Http\Controllers\Auth
 */
class RequestPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * RequestPasswordController constructor.
     * @param string|null $broker
     */
    public function __construct(private ?string $broker = null)
    {
        $this->broker = 'users';
    }
}
