@extends('layouts.main')
@section('content')
<div class="row">
@foreach($data as $item)
  <div class="col-md-3">
    <div style="height:200px">
    <img src="{{asset($item->img)}}" alt="" class="img-responsive" style="height:100%">
    </div>
    <h3 class="goods-name">{{$item->name}}</h3>
    <span><span style="font-weight: bold;">￥</span> <span style="color:red">{{$item->price}}</span> 　　<a class="btn btn-primary btn-xs" href="">查看</a>　<a class="btn btn-info btn-xs" href="{{url('/order/create',[$item->id])}}">购买</a></span>
  </div>
@endforeach
</div>
@endsection