<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HandleSessionExpired
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
        try {
            return $next($request);
        } catch (\Illuminate\Session\TokenMismatchException $e) {
            // Penanganan error 419 (CSRF Token Expired)
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Session expired. Please login again.'], 419);
            }

            return redirect()->route('login')->with('message', 'Session Anda telah kedaluwarsa. Silakan login kembali.');
        } catch (\Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException $e) {
            // Penanganan error 401 (Unauthorized)
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized. Please login to continue.'], 401);
            }

            return redirect()->route('login')->with('message', 'Anda tidak memiliki izin untuk mengakses halaman ini. Silakan login.');
        } catch (\Symfony\Component\HttpKernel\Exception\HttpException $e) {
            // Penanganan error lain seperti 403, 404, dll
            if ($e->getStatusCode() == 403) {
                return redirect()->route('login')->with('message', 'Anda tidak memiliki akses ke halaman ini.');
            }

            if ($e->getStatusCode() == 404) {
                return redirect()->route('home')->with('message', 'Halaman tidak ditemukan.');
            }

            // Penanganan untuk error lainnya
            return response()->view('errors.' . $e->getStatusCode(), [], $e->getStatusCode());
        }
    }
}
