@extends('layout.layout')
@section('navigations')
    @guest
        <li class="nav-item me-3">
            <a class="nav-link text-white" href={{route('register')}}> Register </a>
        </li>
        <li class="nav-item me-3">
            <a class="nav-link text-white" href={{route('login')}}> Login </a>
        </li>
    @else
        <li class="nav-item me-3">
            <a class="nav-link text-white" href={{route('profileinfo')}}> Profile Info </a>
        </li>
        <form class="nav-item me-3" action="{{route('logout')}}" method="POST">
            @csrf
            <input type="submit" class = "m-0 p-0 border-0 bg-transparent text-white w-100 text-start" value="Logout">
        </form>
    @endauth
@endsection
