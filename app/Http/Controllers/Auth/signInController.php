<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;





class signInController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //

        $request->validate([
            'email'=> 'required',
            'password' => 'required',
        ]);

        // return 'signIn';
        if(!$token = auth()->attempt($request->only('email','password'))){
        // dd(auth());
            return response(null,401);
            }

            return response()->json([compact('token')]);


    }
}
