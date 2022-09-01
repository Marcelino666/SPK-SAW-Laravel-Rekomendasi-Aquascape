<?php

namespace App\Http\Controllers;

// use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {
        // Sudah di folder middleware
        // try {
        // //    $user = JWTAuth::parseToken()->authenticate();
        //     $user = auth()->user();
        // } catch (JWTException $e) {
        //     // if($e instanceof \Tymon\JWTAuth\Exceptions\UserNotDefinedException){
        //     //     return response()->json(['user_not_found'], 404);
        //     // } else if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
        //     //     return response()->json(['token_expired'], $e);
        //     // } else if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
        //     //     return response()->json(['token_invalid'], 401);
        //     // } else if($e instanceof \Tymon\JWTAuth\Exceptions\JWTException) {
        //     //     return response()->json(['token_absent'], $e);
        //     // }
        //     return response()->json([
        //         'error' => 'Could not create token'
        //     ], 500);
        // }
        // return $user;
        
        $user = $request->user();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'username' => $user->username,
            'email' => $user->email,
            'is_admin' => $user->is_admin,
        ]);
        
    }
}
