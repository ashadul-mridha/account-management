<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomini extends Model
{
    protected $fillable = [
        'name', 'member_id','photo','fatherorhusband','motherorwife','mobile_num','nid_num','account_number','address','nid_photo_front','nid_photo_back'
    ];

    public function member(){
       return $this->belongsTo(Member::class,'member_id','id');
    }

    
}
