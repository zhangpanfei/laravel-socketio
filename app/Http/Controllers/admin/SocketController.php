<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class SocketController extends Controller
{
    public function postSet(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = \Crypt::decrypt($data['user_id']);
        
        return Redis::sAdd('SocketId',json_encode($data));     
    }

    public function getRem(Request $request)
    {
        $id = $request->input('socket_id');
        $res = Redis::smembers('SocketId');
        //echo $id;
        foreach($res as $val){
            if(strpos($val,$id)!==false){
                //echo 11111111;
                Redis::srem('SocketId',$val);
            }
        }
        echo 'ok';  
    }
}
