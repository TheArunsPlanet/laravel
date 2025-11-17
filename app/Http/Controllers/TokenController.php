<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function generate(Request $request)
    {
        $user = $request->user();

        // Delete old tokens if you want only 1 active
        $user->tokens()->delete();

        // Create new one
        $token = $user->createToken('user_api_key')->plainTextToken;

        return response()->json([
            'message' => 'Token generated successfully.',
            'token' => $token
        ]);
    }

    public function show(Request $request)
    {
        // Optionally: show all user tokens
        return response()->json([
            'tokens' => $request->user()->tokens->pluck('name')
        ]);
    }
}
