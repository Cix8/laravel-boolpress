@extends('layouts.dashboard')

@section('content')
    <h1>Modifica questo Post</h1>

    <form action="{{ route('admin.posts.update', ['post' => $selected_post->id]) }}" method="POST">
        @csrf
        @method("PUT")

        <label for="title">Titolo</label>
        <input type="text" name="title" id="title" value="{{ old('title') ? old('title') : $selected_post->title }}">

        <label for="text">Text</label>
        <input type="text" name="text" id="text" value="{{ old('text') ? old('text') : $selected_post->text }}">

        <button type="submit">Modifica Post</button>
    </form>
@endsection