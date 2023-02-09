@extends('app')
@section('content')
    <h1>Home</h1>
    @auth
        <p>Welcome <b>{{ Auth::user()->name }}</b></p>
        {{-- <a class="btn btn-primary" href="{{ route('password') }}">Change Password</a> --}}
        <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
        <a class="btn btn-info" href="{{ route('create') }}">Buat Post</a>
        <a class="btn btn-primary" href="{{ route('export') }}">Lihat Data</a>
    @endauth
    @guest
        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
        <a class="btn btn-info" href="{{ route('register') }}">Register</a>
    @endguest
@endsection
