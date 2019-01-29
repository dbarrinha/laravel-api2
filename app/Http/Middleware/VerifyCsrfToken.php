<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    public function handle($request, Closure $next)
    {
            // Add this:
            if($request->method() == 'POST')
            {
            return $next($request);
            }

        if ($request->method() == 'GET' || $this->tokensMatch($request))
        {
            return $next($request);
        }
        throw new TokenMismatchException;
    }

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
