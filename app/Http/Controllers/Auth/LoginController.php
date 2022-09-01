<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {
        //Unauthorized Error
        $credentials = $request->only('email', 'password');
        if (!$token = auth()->attempt($credentials)) {
            return response(['error' => 'Invalid username or password'], 401);
        }

        return response()->json(['token' => $token]);
    }
}
