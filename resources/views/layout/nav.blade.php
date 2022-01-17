@extends('layout.layout')
@section('navigations')
    @guest
        <li class="nav-item me-5">
            <a class="nav-link text-white" href={{route('register')}}> Register </a>
        </li>
        <li class="nav-item me-5">
            <a class="nav-link text-white" href={{route('login')}}> Login </a>
        </li>
    @else
        <li class="nav-item me-5">
            <a class="nav-link text-white" href={{route('profileinfo', ['nim' => Auth::id()])}}> Profile Info </a>
        </li>
        <form class="nav-item me-5" action="{{route('logout')}}" method="POST">
            @csrf
            <input type="submit" class = "m-0 mt-2 p-0 border-0 bg-transparent text-white w-100 text-start" value="Logout">
        </form>
    @endauth
@endsection
