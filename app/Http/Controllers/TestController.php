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
    public function test1(){
        $key='1910';
        $data='hello world';
        $sign=sha1($data.$key);
//        dd($sign);
        echo '要发送的数据'.$data;echo '</br>';
        echo '要发送的签名：'.$sign;echo '<hr>';
        $b_url="http://www.1910.com/secret?data=".$data."&sign=".$sign;
        echo $b_url;
    }
    public function secret(){
        echo '<pre>';print_r($_GET);echo '</pre>';
        $key='1910';
        $data=$_GET['data'];
        $sign=$_GET['sign'];
//        dd($data);
        $local_sign=sha1($data.$key);
//        dd($local_sign);
        echo '签名:'.$local_sign;echo '</br>';
        if($sign==$local_sign){
          echo '验证成功';
        }else{
            echo '验证失败';
        }
    }
    public function www(){
        $key='1910';
        $url='http://www.api.com/api/info';
        $data='hello';
        $sign=sha1($data.$key);
        $url=$url . '?data='.$data.'&sign='.$sign;
//        echo $url;die;
        $response=file_get_contents($url);
        echo $response;
    }
    public function sendData(){
        $url="http://www.api.com/test/receive";
        $response=file_get_contents($url);
        echo $response;
    }
    public function postData(){
        $key='secret';

        $data=[
            'user_name'=>'wangwu',
            'user_age'=>20
        ];
        $str=json_encode($data).$key;
        $sign=sha1($str);
        $send_data=[
          'data'=>json_encode($data),
          'sign'=>$sign
        ];
        $url="http://www.api.com/test/receivepost";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$send_data);
       curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $response = curl_exec($ch);
        $errno=curl_errno($ch);
        $errmsg=curl_error($ch);
        if($errno){
          var_dump($errmsg);die;
        }
        curl_close($ch);
        echo $response;
    }
    public function encrypt1()
    {
        //加密
        $data = "土豆土豆，我是地瓜";
        $method = "AES-256-CBC";
        $key = "1910api";
        $iv = "hellohelloABCDEF";
        $enc_data = openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);
        $sign=sha1($enc_data.$key);
        $post_data=[
            'data'=>$enc_data,
            'sign' =>$sign
        ];
        $url="http://www.api.com/test/encrypt1";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$post_data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $response=curl_exec($ch);

        $errno=curl_errno($ch);
        if($errno){
            $errmsg=curl_error($ch);
            var_dump($errmsg);die;
        }
        curl_close($ch);
        echo $response;

    }
}
