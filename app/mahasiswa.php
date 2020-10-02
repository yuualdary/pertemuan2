<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    //
    protected $primaryKey="student_id";

    protected $fillable = [
        'student_name','nim','faculty','majors','ext','whatsapp','std_created_at','std_created_by','std_modified_by',
    ];

    public $timestamp=false;

    public function user(){

        return $this->belongsTo(user::class);
    }

    public function pinjaman(){

        return $this->belongsTo(pinjaman::class);
    }

    
    

    


}
