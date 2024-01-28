<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{

    public function LoginUser(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('api_token')->plainTextToken;
            $respnose = [
                'token' => $token,
                'user' => $user,
                'IsAdmin' => $user->IsAdmin
            ];
            return response()->json(['data' => $respnose], 200);
        } else {
            return response()->json(['data' => "Utilisateur non trouvé", 'status' => "user"], 401);
        }
    }
    //
}
