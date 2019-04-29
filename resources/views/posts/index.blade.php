@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <ul>
    @foreach($posts as $post)
        <li class="post-element">
            <a href="{{ $post->url }}">
                {{ $post->title }}
            </a>
        </li>
    @endforeach
    </ul>

    {{ $posts->render() }}


@endsection