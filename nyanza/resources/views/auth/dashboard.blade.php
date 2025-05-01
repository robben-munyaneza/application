@extends('component.sidebar')

@section('content')

<h2>Welcome, {{ $user->UserName }}</h2>

<p>You are logged in.</p>

<a href="/logout">Logout</a>
@endsection

