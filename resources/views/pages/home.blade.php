@extends('layout.nav')


@section('content')

    <div class = 'row card bg-transparent justify-content-center align-items-center'>
        <div class ='col-sm-1 align-items-end'>
            <button class="carousel-control-prev" type="button" data-bs-target="#Matches" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
        </div>
        <div class = 'col-sm-8'>
            <div id="Matches" class="carousel slide" data-bs-interval='false'>
                <div class="carousel-inner">
                    @php
                        $skip = 0;
                    @endphp
                    @foreach($users as $user)
                        @if ($skip == 0)
                            {{$skip = 1;}}
                            <div class="carousel-item active">
                        @else
                            <div class="carousel-item">
                        @endif
                                <a href = {{route('profileinfo',['nim' => $user['nim']])}}>
                                    <img src = "{{asset("profile/".$user['detail']['profilePhoto'])}}" class = "d-block w-100" alt="profile">
                                </a>
                                <div class="carousel-caption">
                                    <h4> {{$user['name']}} </h6>
                                    <p> {{$user['detail']['gender']}}, {{$user['detail']['tanggalLahir']}} </p>
                                </div>
                            </div>
                    @endforeach
                </div>

            </div>
        </div>
        <div class ='col-sm-1'>
            <button class="carousel-control-next" type="button" data-bs-target="#Matches" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="d-flex mt-3 justify-content-around text-black text-center mb-5 rounded bg-white p-3">
            <div class="col w-50 bg-transparent">
                <hr>
                <div class = 'row'>
                    <h1>
                        List Match
                    </h1>
                </div>
                <hr>
                @foreach($requestedmatch as $match)
                    <form class = 'row align-items-center justify-content-center' action = {{route('home.matchaccept')}} method='post'>
                        @csrf
                        <input type='hidden' name='id' value = {{$match['id']}}>
                        <input type='hidden' name='nimUser' value = {{$match['nimUser']}}>
                        <button type="submit" class="col-sm-3 text-center btn btn-primary">
                            {{$match['nimUser']}}
                        </button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection









