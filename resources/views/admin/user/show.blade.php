@extends('admin.base')

@section('content')

    <form action="{{ route('admin.user.edits',['id'=>$user->id]) }}" method="post">
    <div class="layui-form-item">
        <label for="" class="layui-form-label">用户名</label>
        <div class="layui-input-inline">
            <input type="text" name="username" value="{{ $user->username ?? old('username') }}" lay-verify="required" placeholder="请输入用户名" class="layui-input" >
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">邮箱</label>
        <div class="layui-input-inline">
            <input type="email" name="email" value="{{$user->email??old('email')}}" lay-verify="email" placeholder="请输入Email" class="layui-input" >
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">手机号</label>
        <div class="layui-input-inline">
            <input type="text" name="phone" value="{{$user->phone??old('phone')}}" required="phone" lay-verify="phone" placeholder="请输入手机号" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">新密码</label>
        <div class="layui-input-inline">
            <input type="password" name="password" placeholder="请输入密码" class="layui-input">
        </div>
    </div>
        {{csrf_field()}}
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        </div>
    </div>
    </form>

@endsection