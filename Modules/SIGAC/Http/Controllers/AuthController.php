<?php

namespace Modules\SIGAC\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Modules\SICA\Entities\Apprentice;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Register user
    public function register(Request $request)
    {
        $attrs = $request->validate([
            'nickname' => 'required|string',
            'person_id' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Create user
        $user = User::create([
            'nickname' => $attrs['nickname'],
            'person_id' => $attrs['person_id'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password']),
        ]);


        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ]);
    }

    // Login user
    public function login(Request $request)
    {
    
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);


        if (!Auth::attempt($attrs)) {
            return response([
                'message' => 'Invalid Credentials',
            ], 403);
        }

        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ], 200);
    }

    // Logout user
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout success',
        ], 200);
    }

    // Get authenticated user
    public function user()
    {
        return response([
            'user' => auth()->user()
        ], 200);
    }


}
