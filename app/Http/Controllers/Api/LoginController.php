<?php

namespace App\Http\Controllers\api;

use App\Traits\Msg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
   
    use Msg;
     /**
      * 注册
      * @return [type] [description]
      */
     public function registered(Request $request){
         try {
             if (empty(Member::where(['phone'=>$request->phone])->first())){

                 if (Redis::get('code_login'.$request->phone) == $request->code){
                     $member = Member::create([

                         'phone'=>$request->phone,
                         'password'=>bcrypt($request->passwrod),
                         'avatar'=>'/uploader/123.jpg',
                         'uuid' => \Faker\Provider\Uuid::uuid(),
                     ]);
                     return response()->json(['status' => 200, 'message' => '注册成功','data'=>$member->id]);
                 }else{
                     return response()->json(['status' => 104, 'message' => '短信验证码错误']);
                 }
             }else{
                 return response()->json(['status'=>102,'message'=>'手机号码已存在']);
             }
         } catch (\Exception $e) {
                 return \response()->json(['status'=>103,'message'=>'系统错误']);
         }



     }

    /**
     * 发送手机短息注册
     */
    public function msg(Request $request){
        $res = $this->sendMsg($request,$request->phone);
        return response()->json($res);
    }


     /**
      * 登录
      * @param  Request $Request [description]
      * @return [type]           [description]
      */
     public function login(Request $Request){




     }
     
}
