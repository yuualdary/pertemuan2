<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pinjaman extends Model
{
    //
    
    protected $primaryKey="pinjaman_id";
    protected $fillable=['borrow_time','deadline',
                        'return_date','studentid',
                        'isontime'];




    public function mahasiswa(){
        return $this->hasMany(mahasiswa::class,'student_id','studentid');
    }
    
    public function book(){
        return $this->hasMany(book::class,'book_id','bookid');
    }

}
