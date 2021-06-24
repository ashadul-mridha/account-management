<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name','photo','fatherorhusband','motherorwife','mobile_num','nid_num','account_number','address','nid_photo_front','nid_photo_back'
    ];

    public function nomini(){
       return $this->hasOne(Nomini::class,'member_id','id');
    }
}
