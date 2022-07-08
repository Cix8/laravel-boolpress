@extends('layouts.dashboard')

@section('content')
    <h1>Modifica questo Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', ['post' => $selected_post->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title"
                value="{{ old('title') ? old('title') : $selected_post->title }}">
        </div>

        <div>
            <label for="text">Text</label>
            <input type="text" name="text" id="text"
                value="{{ old('text') ? old('text') : $selected_post->text }}">
        </div>

        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id">
                <option value="">None</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $selected_post->category && old('category_id', $selected_post->category->id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <span>Tags</span>
            @foreach ($tags as $tag)
                <div>
                    <input type="checkbox" name="tags[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', [])) || $selected_post->tags->contains($tag) ? 'checked' : '' }}>
                    <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit">Modifica Post</button>
    </form>
@endsection
