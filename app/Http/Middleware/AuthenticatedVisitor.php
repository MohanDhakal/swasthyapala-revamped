<?php

namespace App\Http\Middleware;

use App\Http\Controllers\VisitorController;
use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class AuthenticatedVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {


        $emailCookie = Cookie::get('email');

        if ($emailCookie !== null ) {
            return  $next($request);
        } else {
            $slug = $request->slug;
            return redirect()->route('visitor', compact('slug'));
        }
    }
}
