<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $user = $request->user();
            $result = User::where('username', $user->username)->firstOrFail();

            $rules = [
                'name' => ['required', 'string'],
                'username' => ['required', 'alpha_num', 'min:3'],
                'email' => ['required', 'email'],
                'oldPassword' => 'nullable',
                'newPassword' => 'nullable',
                'confirmNewPassword' => 'nullable',
            ];

            if ($request->username != $result->username) {
                $rules['username'] = 'unique:users,username';
            }

            if ($request->email != $result->email) {
                $rules['email'] = ['unique:users,email','email'];
            }

            if ($request->oldPassword || $request->newPassword || $request->confirmNewPassword) {
                $rules['oldPassword'] = 'required';
                $rules['newPassword'] = ['required', 'min:8'];
                $rules['confirmNewPassword'] = ['required', 'same:newPassword'];

                if (!Hash::check($request->oldPassword, $result->password)) {
                    return response([
                        'error' => 'Your old password is wrong !'
                    ], Response::HTTP_UNPROCESSABLE_ENTITY);
                };
            };

            $validator = Validator::make(
                $request->all(),
                $rules
            );

            if ($validator->fails()) {
                return response([
                    'errors' => $validator->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $result->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
            ]);

            if ($request->newPassword) {
                $result->update([
                    'oldPassword' => $request->oldPassword,
                    'newPassword' => $request->newPassword,
                    'confirmNewPassword' => $request->confirmNewPassword,
                ]);
            }

            $response = [
                'message' => 'Data updated successfully !'
            ];
            return response()->json($response, Response::HTTP_OK);

        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
