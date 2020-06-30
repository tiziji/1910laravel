<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use App\Model\Token;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function a(){
        $request_uri=$_SERVER["REQUEST_URI"];
        echo 'request_uri:' .$request_uri;echo '<br>';
        $url_hash=substr(md5($request_uri),5,10);
       $key='access_total_'.$request_uri;
       $expire=10;
       echo 'redis key:'.$key;
       $token=Redis::get($key);
       if($token>10){

           echo "请求过于频繁，请{$expire}秒后再试";
           Redis::expire($key,$expire);
       }else{
           $num=Redis::incr($key);
           echo '当前访问次数'.$token;
       }
    }
    public function b(){
        $key='access_tota2';
        $token=Redis::incr($key);
        if($token>10){

            echo "请求过于频繁，请稍后再试";
        }else{
            echo '当前访问次数'.$token;
        }
    }

}