<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $apikey;

    public function __construct()
    {
        $this->apikey = env('API_KEY');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'apikey' => 'required|string'
        ]);

        if($validator->fails() || $request->apikey !== $this->apikey) {
            return response()->json([
                'message' => 'could not create user',
            ], 400);
        }

        $user = User::create([
            'user' => $request->user,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => "Hi ". $user->user,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ], 200);
    }
}
