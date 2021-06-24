<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactioncal extends Model
{
    protected $guarded = [];

    public function bank(){
      return  $this->belongsTo(BankAccount::class,'bank_id','id');
    }

    public function supplier(){
        return  $this->belongsTo(Supplier::class,'supplier_id','id');
      }
    
}
