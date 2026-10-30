<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'], // <-- Validasi Company Name
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Logika menentukan role berdasarkan email yang didaftarkan
        $role = 'owner'; // Default role
        if (str_contains($request->email, 'manager')) {
            $role = 'manager';
        } elseif (str_contains($request->email, 'staff')) {
            $role = 'staff';
        } elseif (str_contains($request->email, 'finance')) {
            $role = 'finance';
        }

        $user = User::create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role, // <-- Simpan role ke database
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect sesuai role masing-masing setelah register
        return redirect(route('dashboard', ['role' => $role]));
    }
}