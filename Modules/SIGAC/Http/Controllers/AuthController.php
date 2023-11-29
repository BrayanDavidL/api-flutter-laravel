<?php

namespace Modules\SIGAC\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
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

    public function login(Request $request)
{
    // Validar los datos de entrada
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => 'Invalid data'], 400);
    }

    // Intentar autenticar al usuario
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = User::user();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 200);
    } else {
        return response()->json(['error' => 'Invalid Credentials'], 403);
    }
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
