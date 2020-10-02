<?php

namespace App;
use Auth;
use Illuminate\Support\Facades\DB;
use App\masters;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
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


     
    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */

    protected $primaryKey ='id';

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public $timestamps = false;
    protected $fillable = [
        'name', 'email','role_id','id_created_at','last_login',
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

        return $this->belongsTo(master::class,'master_id','role_id');
        
    }

    public function mahasiswa(){

        return $this->hasOne(mahasiswa::class,'std_created_by','id');

    }

    private function getUserRole()
    {
        return $this->masters()->getResults();

      

        // return $job;
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
        
        
        // $job = $this->getUserRole();
        // $textrole = $this->hasArole->text1;
        // $test = $this->hasARole->text1;
        // dd($test);

    //   $coba=$this->hasARole->text1;


        $text=DB::table('users')
                ->join('masters','masters.master_id','=','users.role_id')
                ->where([['users.id','=',auth::user()->id]])
                ->get();
        foreach($text as $t){
        
        $job=$t->text1;
        }

        if ($role == $job) {

        return true;
        }
            return false;
    }
    //uncomment sampai sini
}









