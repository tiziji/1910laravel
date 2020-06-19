<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
class TestController extends Controller
{
    public function hello(){
        echo date("Y-m-d h:i:s");
    }
    public function redis1(){
      $key='name1';
      $val1=Redis::get($key);
      echo $key.$val1;
    }
}
