<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $guarded=[];

    protected $attributes=[
      'active'=>1
    ];
    public function getActiveAttribute($attribute){
      return $this->activeOptions()[$attribute];
    }

    public function scopeActive($query){
      return $query->where('active',1);
    }

    public function scopeInactive($query){
      return $query->where('active',2);
    }

    public function company(){
      return $this->belongsTo('\App\Company');
    }

    public function activeOptions(){
      return [
        1=>'活動中',
        2=>'休止',
        3=>'オンライン',
      ];
    }

}
