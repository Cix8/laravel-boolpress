@extends('layouts.dashboard')

@section('content')
    <h1>Crea un nuovo Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">

        <label for="text">Text</label>
        <input type="text" name="text" id="text" value="{{ old('text') }}">

        <button type="submit">Crea Post</button>
    </form>
@endsection
