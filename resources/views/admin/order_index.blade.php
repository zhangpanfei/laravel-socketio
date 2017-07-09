@extends('layouts.admin')
@section('content')
<!-- <div class="pull-right"><a href="{{url('admin/goods/create')}}" class="btn btn-small btn-info">增加</a></div> -->
<hr>
<table class="table table-bordered">
  <tr>
  	<th>ID</th>
    <th>订单号</th>
  	<th>商品</th>
  	<th>价格</th>
  	<th>购买人</th>
  	<th>状态</th>
  	<th>添加时间</th>
  	<th>操作</th>
  </tr>
  @if(isset($data))
  @foreach($data as $item)
  <tr>
  	<td>{{$item->id}}</td>
    <td>{{$item->order_no}}</td>
  	<td>{{$item->goods->name}}</td>
  	<td>{{$item->goods->price}}</td>
  	<td>{{$item->user->name}}</td>
    <td>已付款</td>
  	<td>{{$item->created_at}}</td>
  	<td><span class="label label-info">修改</span>　<span class="label label-danger">删除</span></td>
  </tr>
  @endforeach
  <tr>
    <td colspan="8"><div class="pull-right">{!! $data->render() !!}</div></td>
  </tr>
  @endif
</table>
@endsection