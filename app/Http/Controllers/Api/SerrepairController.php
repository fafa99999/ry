<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\PublicController;
use App\Traits\Msg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SerrepairController extends Controller
{

	use Msg;
 	/**
 	 * 添加报修
 	 * @param  Request $request [description]
 	 * @return [type]           [description]
 	 */
    public function ser_store(Request $request){
 		
    
    }

    /**
     * 查看报修
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request){
    
    }
}
