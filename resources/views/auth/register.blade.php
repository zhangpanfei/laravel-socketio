@extends('layouts.main')
@section('content')
<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="name">用户名</label> 
        <input id=name type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name">
    </div>

    <div class="form-group">
        <label for="email">邮箱</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label for="password">密码</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="password_confirmation">确认密码</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-default">注册</button>
</form>
@endsection