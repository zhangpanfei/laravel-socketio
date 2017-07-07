@extends('layouts.main')
@section('content')
<div class="jumbotron">
  <h2>下单成功!!!</h2>
  <h3>订单号为: <span class="text-info">{{$order->order_no}}</span></h3>
  <p>恭喜您购得 <span style="color:red;font-weight: bold;">{{$goods->name}}<span></p>
  <p><a class="btn btn-success" href="{{url('home')}}" role="button">返回</a></p>
</div>
@endsection