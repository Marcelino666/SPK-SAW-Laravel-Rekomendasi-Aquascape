<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Auth\ForgotRequest;
use App\Http\Requests\Auth\ResetRequest;
use DateTime;
use Illuminate\Support\Facades\Hash;

class ForgotController extends Controller
{
    public function forgot(ForgotRequest $request){
        try{
            $email = $request->input('email');
            
            // Check User
            if(User::where('email', $email)->doesntExist()){
                return response([
                    'message' => 'User doesn\'t exists!'
                ], 404);
            }

            $RandomToken = Str::random(10);

            // Save
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $RandomToken,
                'created_at' => new DateTime()
            ]);

            // Send
            Mail::send(
                'Mails.forgot',['token' => $RandomToken,], 
                function(Message $message) use($email){
                    $message->to($email);
                    $message->subject('Reset your password');
                }
            );

            return response([
                'message' => 'Check your email'
            ]);
        }catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function reset(ResetRequest $request){
        $token = $request->input('token');

        $passwordResets = DB::table('password_resets')->where('token', $token)->first();

        if(!$passwordResets){
            return response([
                'message' => 'Invalid token!'
            ], 400);
        }

        if(!$user = User::where('email', $passwordResets->email)->first()){
            return response([
                'message' => 'User doesn\'t exist!'
            ], 404);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        DB::table('password_resets')->where('token', $token)->delete();

        return response([
            'message' => 'Password has been changed !'
        ]);
    }
}
