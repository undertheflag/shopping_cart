@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/posts.css') }}" type="text/css">
@endsection

@section('content')
    <h2>Your posts</h2>

    <table>
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ str_limit($post->content, 100) }}</td>
        </tr>
    @endforeach
    </table>
@endsection
@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/posts.css') }}" type="text/css">
@endsection

@section('content')
    <h2>Your posts</h2>

    <table>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ str_limit($post->content, 100) }}</td>
            </tr>
        @endforeach
    </table>
@endsection
