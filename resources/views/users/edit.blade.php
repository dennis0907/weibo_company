@extends('layouts.default')
@section('title','編輯個人資料')

@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>編輯個人資料</h5>
            </div>
            <div class="card-body">

                @include('shared._errors')

                <div class="gravatar_edit">
                    <a href="http://gravatar.com/emails" target="_blank">
                        <img src="{{ $user->gravatar('200') }}" alt=" {{ $user->name }}" class="gravatar">
                    </a>
                </div>

                <form action="{{ route('users.update',$user->id )}}" method="post">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group mb-3">
                        <label for="name">姓名:</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">郵件:</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">密碼:</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation">確認密碼:</label>
                        <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
            </div>
        </div>
    </div>
@stop
