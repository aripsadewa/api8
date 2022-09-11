<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!$token = auth()->attempt($request->only('email','password'))) {
            return response(null, 401);
        }

        return $this->responseWithToken($token);
    }

    protected function responseWithToken($token) {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
