<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddProduct extends Model
{
    
    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_name','id');
    }
}
