@extends('layouts.default')
@section('title','全部用戶')

@section('content')
<div class="offset-md-2 col-md-8">
    <h2 class="mb-4 text-center">全部用戶</h2>
    <div class="list-group list-group-flush">
        @foreach ($users as $user)
            @include('users._user')
        @endforeach
    </div>
    <div class="mt-4 position-absolute start-50 translate-middle">
        {!! $users->render() !!}
    </div>
</div>
@stop
