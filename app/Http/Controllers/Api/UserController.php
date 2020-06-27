<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //注册
    public function reg(Request $request)
    {
        $user_name = $request->post('user_name');
//        var_dump($user_name);die;
        $email = $request->post('email');
        $password = $request->post('password');
        $pwd = $request->post('password_q');
        $len = strlen($password);
        if(empty($user_name)){
            $response = [
                'errno' => 50001,
                'msg' => '用户名不能为空'
            ];
            return $response;
        }
        $u =User::where(['user_name'=>$user_name])->first();
        if($u){
            $response = [
                'errno' => 50007,
                'msg' => '用户名已存在'
            ];
            return $response;
        }
        if(empty($email)){
            $response = [
                'errno' => 50002,
                'msg' => '邮箱不能为空'
            ];
            return $response;
        }
        if(empty($password)){
            $response = [
                'errno' => 50003,
                'msg' => '密码不能为空'
            ];
            return $response;
        }
        if(strlen($password) < 6){
            $response = [
                'errno' => 50004,
                'msg' => '密码长度必须大于等于6'
            ];
            return $response;
        }
        if(empty($pwd)){
            $response = [
                'errno' => 50005,
                'msg' => '确认密码不能为空'
            ];
            return $response;
        }

        if($password != $pwd){
            $response = [
                'errno' => 50006,
                'msg' => '两次密码不一致'
            ];
            return $response;
        }

        $usersModel = new User();
        $usersModel->user_name = $user_name;
        $usersModel->password = password_hash($password,PASSWORD_BCRYPT);
        $usersModel->email= $email;
        $usersModel->reg_time= time();
        $res=$usersModel->save();
        if($res){
            $response= [
                'errno' => 0,
                'msg' => "注册成功"
            ];
        }else{
            $response = [
                'errno'=> 50007,
                'msg' => "注册失败"
            ];
        }
        return $response;
    }
}