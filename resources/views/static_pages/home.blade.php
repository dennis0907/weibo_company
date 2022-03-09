@extends('layouts/default')
@section('content')
    <div class="mt-4 p-5 bg-light rounded">
        <h1>Hello Laravel</h1>
        <p class="lead" >
            您現在看到的是<a href="#">Laravel 入門</a>的範例主頁。
        </p>
        <p>
            從這開始練習。
        </p>
        <p>
            <a class="btn btn-lg btn-success" href="{{route('signup')}}">現在註冊</a>
        </p>
    </div>
@stop
