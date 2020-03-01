<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class Company extends Model
{
    protected $guarded = [];

    public function getPhoneAttribute(string $value){
      return substr($value,0,strlen($value)-8).'-'.substr($value,-8,4).'-'.substr($value,-4);
    }

    public function customers(){
      return $this->hasMany(Customer::class);
    }
}
