<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master extends Model
{
    //

    public $timestamp=false;
    protected $fillabel=[
        'master_id','prefix','text1',

    ];

    public function user(){

        return $this->hasOne(master::class,'master_id','role_id');
        
    }





}
