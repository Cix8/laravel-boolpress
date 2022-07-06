@extends('layouts.dashboard')

@section('content')
    <ol>
        @foreach ($posts as $post)
            <li>
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->text }}</p>
                <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Modifica</a>
            </li>
        @endforeach
    </ol>
@endsection
