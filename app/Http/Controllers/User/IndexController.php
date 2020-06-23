<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Validator;
class IndexController extends Controller
{
    public function reg(){
        return view("user.reg");
    }
    public function regDo(){
        $data=request()->except('_token');
//        dd($data);
        $validator=Validator::make($data,[
            "user_name"=>'required|unique:p_users',
            'email'=>'required|unique:p_users',
            'password'=>'min:6',
            'password_q'=>'same:password',
        ],[
            'user_name.required'=>'名称不能为空',
            'user_name.unique'=>'名称已存在',
            'email.required'=>'邮箱不能为空',
            'email.unique'=>'邮箱已存在',
            'password.min'=>'密码长度不能小于6个字符',
            'password_q.same'=>'密码不一致',
        ]);
        if($validator->fails()){
            return redirect('user/reg')
                ->withErrors($validator)
                ->withInput();
        }
        $password1 = password_hash($data['password'], PASSWORD_BCRYPT);
        $user_model=new User();
        $user_model->reg_time=time();
        $user_model->user_name=$data["user_name"];
        $user_model->email=$data["email"];
        $user_model->password=$password1;
        $res=$user_model->save();
        if($res){
            return redirect("user/login");
        }
    }

    public function login(){
        return view("user.login");
    }
    public function loginDo(){
        $data=request()->except('_token');
        $res=User::where('user_name','=',$data['user_name'])->first();
        if(!$res){
            return redirect('user/login')->with('msg','没有此用户');
        }
        if($data['password']!=password_verify($data['password'],$res['password'])){
            return redirect('user/login')->with('msg','密码错误');
        }
        return redirect('/');
    }
}
