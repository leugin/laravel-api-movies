<?php


namespace App\Http\Controllers\Api;


use App\Http\Requests\ApiLogin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Leugin\ApiResponse\Helpers\ApiResponse;

class LoginController
{

    public function login(ApiLogin $request) {


        if(Auth::attempt($request->only(['email','password']))) {
            /**@var  User $user*/
            $user = auth()->user();
            return ApiResponse::created([
                'token'=>$user->createToken('item')->accessToken
            ]);

        }
        return  ApiResponse::unAuthorized();
    }
}
