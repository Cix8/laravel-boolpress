@extends('layouts.dashboard')

@section('content')
    <h2>Categoria: {{ $category->name }}</h2>

    <ol>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->text }}</p>
                    <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}"
                            class="btn btn-primary">Modifica</a>
                        <button type="submit" class="btn btn-danger">Elimina Post</button>
                    </form>
                </a>
            </li>
        @endforeach
    </ol>
@endsection
