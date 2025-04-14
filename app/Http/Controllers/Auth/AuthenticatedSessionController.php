<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    /**
     * Mostrar la vista de inicio de sesión.
     */
    public function create(): View
    {
        session()->forget('url.intended'); // Elimina redirección previa a /dashboard
        return view('auth.login');
    }

    /**
     * Procesar el inicio de sesión del usuario.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->rol === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->rol === 'cliente') {
            return redirect()->route('cliente.inicio');
        }

        Auth::logout();
        Session::flush();
        abort(403, 'Rol no autorizado.');
    }

    /**
     * Cerrar sesión del usuario autenticado.
     */

     public function destroy(Request $request): RedirectResponse
     {
         Auth::guard('web')->logout();
     
         $request->session()->invalidate();
         $request->session()->regenerateToken();
     
         return redirect('/');
     }  
}
