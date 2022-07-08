@extends('layouts.dashboard')

@section('content')
    <ul>
        <li>
            <h2>{{ $selected_post->title }}</h2>
        </li>
        <li>
            <p>{{ $selected_post->text }}</p>
        </li>
        <li>
            <p>{{ $category ? $category->name : 'no category' }}</p>
        </li>
        <li>
            <span>Tags:</span>
            @forelse ($selected_post->tags as $tag)
                <span>
                    {{ $tag->name }}{{ $loop->last ? '' : ', ' }}
                </span>
            @empty
                <span>
                    no tags
                </span>
            @endforelse
        </li>
        <li>
            <form action="{{ route('admin.posts.destroy', ['post' => $selected_post->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit">Elimina Post</button>
            </form>
        </li>
    </ul>
@endsection
