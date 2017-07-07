@extends('layouts.main')
@section('content')
<div>
    @if($errors->count)
    {{$errors->first()}}
    @endif
</div>
<form action="{{url('auth/login')}}" method="post">
    {!! csrf_field() !!}
  <div class="form-group">
    <label for="exampleInputEmail1">邮箱</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">密码</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">登录</button>
</form>
@endsection