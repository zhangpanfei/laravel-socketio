<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Goods;
use App\Order;

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
