<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_name' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => 'required|min:6|confirmed',
            'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileName = time() . '.' . $request->user_image->extension();

        $request->user_image->move(public_path('images'), $fileName);


        $user = User::create([
            'name' => $request->name,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permission' => $request->permission,
            'user_image' => $fileName,
        ]);
        $user->save();

        return redirect()->route('dashboard')->with('success', [], __('User created successfully'));
    }


    public function index()
    {
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        return view('edit_user', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'user_name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($id)],            
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            
        ]);

        $user = User::find($id);


        
        if($request->hasFile('user_image')){
            $fileName = time() . '.' . $request->user_image->extension();

            $request->user_image->move(public_path('images'), $fileName);
             
            $user->update(['user_image'=>$fileName]);
        }
      

        $user->update([
            'name' => $request->name,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'permission' => $request->permission,
        ]);

        return redirect()->route('dashboard')->with('success');
    }


    public function destroy(Request $request, $id): RedirectResponse
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('dashboard')->with('success', 'User deleted successfully');
    }
}
