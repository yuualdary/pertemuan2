<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\user;
use carbon\carbon;
use  App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        //

        User::create([   
            'name' => request('name'),
            'email' =>request('email'),
            'password' =>bcrypt(request('password')),
            'id_created_at'=>Carbon::now()->toDateTimeString(),
            'last_login'=>Carbon::now()->toDateTimeString(),
        ]);
    }

    
}
