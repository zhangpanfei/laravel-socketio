@extends('layouts.admin')
@section('content')
<p>商品增加</p>
<form class="form-horizontal" method="POST" action="{{url('admin/goods')}}" enctype="multipart/form-data">
{{csrf_field()}}
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">商品名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="{{old('name')?:(isset($item['name'])?$item['name']:'')}}" id="name" placeholder="name">
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-2 control-label">价格</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="price" name="price" placeholder="price" value="{{old('price')?:(isset($item['price'])?$item['price']:'')}}">
    </div>
  </div>
  <div class="form-group">
    <label for="img" class="col-sm-2 control-label">图片</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="img" name="img" placeholder="img">
    </div>
  </div>

  <div class="form-group">
    <label for="num" class="col-sm-2 control-label">库存</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="num" name="num" placeholder="num" value="{{old('num')?:(isset($item['num'])?$item['num']:'')}}">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">提交</button>
    </div>
  </div>
</form>
@endsection