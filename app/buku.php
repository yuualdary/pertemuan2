<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    //
    protected $primaryKey="book_id";

    protected $fillable=[
        'title','author','release_date','book_created_at','book_created_by',
    ];

    public $timestamp = false;

    public function pinjaman(){
        
        return $this->belongsTo(pinjaman::class);
    }


}
