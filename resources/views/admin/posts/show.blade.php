@extends('layouts.dashboard')

@section('content')
    <ul>
        <li>
            <h2>{{ $selected_post->title }}</h2>
        </li>
        <li>
            <p>{{ $selected_post->text }}</p>
        </li>
    </ul>
@endsection