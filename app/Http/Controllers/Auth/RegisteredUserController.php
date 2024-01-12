<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
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
     * @throws \Illuminate\Validation\ValidationException
     */
 
     public function store(Request $request): RedirectResponse
     {
         $request->validate([
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'user_name' => ['required', 'string', 'max:255', 'unique:users'],
             'password' => ['required', 'confirmed', Rules\Password::defaults()],
             'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);
     
         $fileName = time() . '.' . $request->user_image->extension();
         
         $request->user_image->move(public_path('images'), $fileName);
     
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'user_name' => $request->user_name,
             'password' => Hash::make($request->password),
             'user_image' => $fileName,
             'permission' => '2',
         ]);
         event(new Registered($user));
     
         Auth::login($user);
     
         return redirect(RouteServiceProvider::HOME);
     }
     
    
}
