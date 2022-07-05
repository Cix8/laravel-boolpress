@extends('layouts.dashboard')

@section('content')
    <h1>Admin Page</h1>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit">Logout</button>
    </form>
@endsection