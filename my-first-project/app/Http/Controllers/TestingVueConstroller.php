<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingVueConstroller extends Controller
{
    public function index(){

      return [
        'name'=>'Bob',
      ];
    }
}
