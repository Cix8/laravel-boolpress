@extends('layouts.dashboard')

@section('content')
    <h2>Categoria: {{ $category->name }}</h2>

    <ol>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->text }}</p>
                    <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Modifica</a>
                </a>
            </li>
        @endforeach
    </ol>
@endsection