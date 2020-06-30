<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Redis;

use Closure;

class CheckPri
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //鉴权
        $token=$request->input('token');
        //鉴定token是否失效
        $uid=Redis::get($token);
       if(!$uid){
           $response=[
             'errno'=>50009,
             'msg'=>'鉴权失败'
           ];
           echo json_encode($response,JSON_UNESCAPED_UNICODE);die;
       }


        return $next($request);
    }
}
