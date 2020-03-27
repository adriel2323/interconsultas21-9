<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */

    protected $except = [
        "/telegram/692740744:AAGSq-V8_nicLqumXbG4-KG-47zeB-Qd8gs/webHook",
        "/test"
    ];
}
