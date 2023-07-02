<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if(Auth::check()) {
            if (Auth::user()->role_as == 1) {
                return $next($request);
            }
            else {
                return redirect('/home')->with('status', 'អ្នកមិនមានសិទ្ធិសម្រាប់ចូលទៅកាន់ទំព័រនេះទេ');
            }
        }
        else {
            return redirect('/login')->with('status', 'សូមចូលទៅកាន់គណនីរបស់អ្នកជាមុនសិន');
        }
    }
}
