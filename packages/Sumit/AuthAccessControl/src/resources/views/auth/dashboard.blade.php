@extends('layout')

@section('title', 'Dashboard')

@section('content')
<h1>Welcome, {{ auth()->user()->name }}</h1>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
@endsection
