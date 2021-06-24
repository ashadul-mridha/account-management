<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    public function transaction(){
        return $this->belongsTo(Paymentinfo::class,'payment_id','id');
    }

    protected $fillable = [
        'member_id','bank_id','amount','check_num','dr','cr','create_by'
    ];
}
