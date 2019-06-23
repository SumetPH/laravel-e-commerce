<?php

namespace App\Http\Middleware;

use App\Cart;
use Closure;

class CartCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()) {
            $cart = Cart::where('user_id', auth()->user()->id)->count();
            session()->put('cart', $cart);
        }
        return $next($request);
    }
}
