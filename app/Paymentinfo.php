<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentinfo extends Model
{
    protected $fillable= [
        'member_id','bussniess_name','transaction_type','reasone','trade','family_number','bank_id ','note','pay_type','amount','create_by'
    ];
    public function member(){
        return $this->belongsTo(Member::class,'member_id','id');
    }
    public function bankaccount(){
        return $this->belongsTo(BankAccount::class,'bank_id','id');
    }
}
