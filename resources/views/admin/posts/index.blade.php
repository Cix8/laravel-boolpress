@extends('layouts.dashboard')

@section('content')
    <ul class="d-flex flex-wrap justify-content-center">
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                    <div class="card m-2 p-2" style="width: 18rem;">
                        <div class="card-body">
                            @if ($post->cover)
                                <img class="card-img-top" src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}">
                            @endif
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text text-secondary" style="max-height: 120px; overflow-y: scroll;">
                                {{ $post->text }}</p>
                            <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}"
                                class="btn btn-primary mt-3">Modifica</a>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
