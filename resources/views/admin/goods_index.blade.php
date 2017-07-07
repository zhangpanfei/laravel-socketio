@extends('layouts.admin')
@section('content')
<div class="pull-right"><a href="{{url('admin/goods/create')}}" class="btn btn-small btn-info">增加</a></div>
<hr>
<table class="table table-bordered">
  <tr>
  	<th>ID</th>
  	<th>商品名</th>
  	<th>价格</th>
  	<th>图片</th>
  	<th>库存</th>
  	<th>添加时间</th>
  	<th>修改时间</th>
  	<th>操作</th>
  </tr>
  @if(isset($goods))
  @foreach($goods as $item)
  <tr>
  	<td>{{$item->id}}</td>
  	<td>{{$item->name}}</td>
  	<td>{{$item->price}}</td>
  	<td><img src="{{asset($item->img)}}" alt="" width="30px"></td>
  	<td>{{$item->num}}</td>
  	<td>{{$item->created_at}}</td>
  	<td>{{$item->updated_at}}</td>
  	<td><span class="label label-info">修改</span>　<span class="label label-danger">删除</span></td>
  </tr>
  @endforeach
  @endif
</table>
@endsection