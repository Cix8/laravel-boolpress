@extends('layouts.dashboard')

@section('content')
    <h1>Admin Page</h1>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit">Logout</button>
    </form>

    <ul>
        <li>
            <a href="{{ route('admin.posts.index') }}">Visualizza tutti i Post</a>
        </li>
        <li>
            <a href="{{ route('admin.posts.create') }}">Crea un nuovo Post</a>
        </li>
        <li>
            <a href="{{ route('admin.categories.index') }}">Visualizza tutte le categorie</a>
        </li>
    </ul>
@endsection