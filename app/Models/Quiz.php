<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id')->where('role','siswa');
    }
}
