<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Goods;
use App\Order;
use App\User;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($goodsId)
    {
        $goods = Goods::findOrFail($goodsId);
        
        $order = new Order;
        $order->user_id = \Auth::User()->id;
        $order->order_no = time();
        $order->goods_id = $goods->id;
        $order->status = 0;
        $res = $order->save();

        
        if ($res) {
            $data = [
                'event' => 'order_create',
                'data' => [
                    'order' => Order::with('user','goods')->find($order->id),
                    'auth' => 'admin',
                    'client_id' => $this->getClientId(),
                ],
            ];
            $this->publish('order_info',$data);
        }

        return $res ? view('order.ok',['order'=>$order,'goods'=>$goods]) : abort(403);
    }

    public function publish($channel, Array $data)
    {
        Redis::publish($channel, json_encode($data));
    }

    public function getClientId()
    {
        $client = collect(Redis::smembers('SocketId'));
        $client = $client->map(function($item){
            return json_decode($item);
        });
        $userIds = User::where('type','admin')->whereIn('id',$client->pluck('user_id'))->lists('id')->toArray();
        $ids = $client->map(function($item) use ($userIds){
            if(in_array($item->user_id, $userIds))
            return $item->client_id;
        });
        return $ids;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
