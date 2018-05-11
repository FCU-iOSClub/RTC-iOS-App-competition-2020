<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class DeadlineOfRegister
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Carbon::create(2018, 5, 16, 0, 0, 0)->lt(Carbon::now())) {
            if (auth()->check()) {
                if (!auth()->user()->hasRole('developer')) {
                    return redirect()->back()->withErrors(['msg'=>'不在開放時間內！']);
                }
            } else {
                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}