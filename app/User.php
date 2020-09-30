<?php

namespace App;
use Auth;
use Illuminate\Support\Facades\DB;
use App\masters;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     * 
     * 
     */

    public $timestamps = false;
    protected $fillable = [
        'name', 'email', 'password','role_id','id_created_at','last_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function masters(){

        return $this->belongsTo(master::class,'role_id','master_id');
        
    }

    private function getUserRole()
    {
        return $this->masters()->getResults();
    }
    //cara pertama
    // private function IsRouteMatch($roles)
    // {
    //     //check if Value in Route same as Role
    //     return (strtolower($roles) == strtolower($this->hasRole->text1)) ? true : false;
    // }

    // public function userRole($roles){


    //     $this->hasRole = $this->getUserRole();
        
    //     if(is_array($roles)){
    //         foreach($roles as $need_role){
    //             if($this->IsRouteMatch($need_role)) {
    //                 return true;
    //             }
    //         }
    //     } else{
    //         return $this->IsRouteMatch($roles);
    //     }
    //     return false;
    // }

//uncomment sampai sini
    // 

    //cara ke 2

    public function hasRole($role)
    {
        
        
        $this->hasARole = $this->getUserRole();
        // $textrole = $this->hasArole->text1;
        // dd($textrole);
        // $test = $this->hasARole->text1;
        // dd($test);
        if ($role == $this->hasARole->text1) {
        return true;
        }
            return false;
    }
    //uncomment sampai sini
}









