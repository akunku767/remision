<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Ambil role_id pengguna yang sedang login
        $roleUser = Auth::user()->role->name;

        // Loop untuk memeriksa setiap permission yang diberikan
        foreach ($roles as $role) {
            if ($roleUser == $role) {
                return $next($request);
            }else{
                continue;
            }
        }

        // Jika tidak ada permission yang cocok, kembalikan response 403 atau redirect
        return redirect()->route('home.index')->with('fail', "Unauthorized Access");
    }
}
