@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <label for="title">Title</label>
        <input type="text" name="title"  id="title" value="{{ old('title') }}">

        <label for="text">Text</label>
        <input type="text" name="text" id="text" value="{{ old('text') }}">

        <button type="submit">Crea Post</button>
    </form>
@endsection