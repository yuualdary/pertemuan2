<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use carbon\carbon;
use auth;
class MainController extends Controller
{


    public function getData(){

        // date_default_timezone_set('Asia/Jakarta');
        $current_date=Carbon::now()->day;

        if($current_date > 1 && $current_date < 10){


            return $next($request);
        }
        dd($current_date);

    }


    // function __construct()
    // {
    //   $this->middleware('mainMiddleware')->only('admin');
    // }

    // public function superAdmin()
    // {
    //     return 'Yes You Are Super Admin';
    // }

    public function admin()
    {
        $user=DB::table('users')
            ->join('masters','masters.master_id','=','users.role_id')
            ->where([['users.id','=',Auth::user()->id]])
            ->get();
        foreach($user as $u){
            $nama=$u->name;
            $role=$u->text1;
            // $coba=$request->user()->hasRole($test);

        }
        // dd($role)

            // dd($coba);

        $getData='Halo '.$nama.' Role Anda '.$role;
        return $getData;
    }


    
    //
}
