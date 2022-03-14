@extends('layouts.default')
@section('title','登入')

@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>登入</h5>
            </div>
            <div class="card-body">
                @include('shared._errors')
                <form action="{{route('login')}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group mt-4">
                        <label for="email">郵件:</label>
                        <input type="text" name="email" class="form-control" value="{{old('email')}}">
                    </div>

                    <div class="form-group mt-4">
                        <label for="password">密碼:</label>
                        <input type="password" name="password" class="form-control" value="{{old('password')}}">
                    </div>

                    <div class="form-group mb-4 mt-2">
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="exampleCheck1" class="form-check-input">
                            <label for="exampleCheck1" class="form-check-label">記住我</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">登入</button>
                </form>

                <hr>

                <p>沒有帳號?<a href="{{route('signup')}}">現在註冊</a></p>
            </div>
        </div>
    </div>
@stop
