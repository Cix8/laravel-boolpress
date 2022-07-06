@extends('layouts.dashboard')

@section('content')
    <ol>
        @foreach ($posts as $post)
            <li>
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->text }}</p>
            </li>
        @endforeach
    </ol>
@endsection
