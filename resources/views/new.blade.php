@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/new.css') }}" type="text/css">
@endsection

@section('content')
    <h2>Add new post</h2>

    <form method="post" action="/new">
        {{ csrf_field() }}
        <div class="component">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ old('title') }}"/>
        </div>
        <div class="component">
            <label>Text</label>
            <textarea rows="20" name="content">{{ old('content') }}</textarea>
        </div>
        <div class="component">
            <button type="submit">Save</button>
        </div>
    </form>
@endsection
