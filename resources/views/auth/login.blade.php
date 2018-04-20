@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/register.css') }}" type="text/css">
@endsection

@section('content')
    <h2>Login</h2>

    <form method="POST" action="/login">
        {!! csrf_field() !!}
        <div class="component">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="component">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="component">
            <input class="checkbox" type="checkbox" name="remember"> Remember Me
        </div>
        <div class="component">
            <button type="submit">Login</button>
        </div>
    </form>
@endsection
