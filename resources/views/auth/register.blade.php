@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/register.css') }}" type="text/css">
@endsection

@section('content')
    <h2>Account registration</h2>

    <form method="post" action="/auth/register">
        {{ csrf_field() }}
        <div class="component">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" />
        </div>
        <div class="component">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}"/>
        </div>
        <div class="component">
            <label>Password</label>
            <input type="password" name="password" />
        </div>
        <div class="component">
            <label>Password confirmation</label>
            <input type="password" name="password_confirmation" />
        </div>
        <div class="component">
            <button type="submit">Create</button>
        </div>
    </form>
@endsection
