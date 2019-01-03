<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
class LoginController extends Controller
{
   

     /**
      * 注册
      * @return [type] [description]
      */
     public function registered(Request $request){
         try {
             if (empty(Member::where(['phone'=>$request->phone])->first())){
                 $member = Member::create([

                     'phone'=>$request->phone,
                     'password'=>bcrypt($request->passwrod),
                     'avatar'=>'/uploader/123.jpg',
                     'uuid' => \Faker\Provider\Uuid::uuid(),
                 ]);
                 return response()->json(['status' => 200, 'message' => '注册成功','data'=>$member->id]);
             }else{
                 return response()->json(['status'=>102,'message'=>'用户已存在']);

             }
         } catch (\Exception $e) {
                 return \response()->json(['status'=>103,'message'=>'系统错误']);
         }



     }




     /**
      * 登录
      * @param  Request $Request [description]
      * @return [type]           [description]
      */
     public function login(Request $Request){




     }
     
}
