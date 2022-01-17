@extends('layout.nav')

@section('content')

    {{-- Profile Info --}}
    <div class="row">
        <div class="d-flex mt-3 justify-content-around text-black text-center mb-5 rounded bg-white">

            {{-- Profile Image --}}
            <div class="col w-25 bg-transparent">
                <img class="img-fluid" src={{asset("profile/".$userdetail['profilePhoto'])}}>
            </div>

            {{-- Profile Details --}}
            <div class="col w-50 bg-transparent">
                <hr>
                <div class = 'row'>
                    <div class = 'col'>
                        <h1>
                            Profile Details
                        </h1>
                    </div>
                </div>
                <hr>
                <form class = 'row text-center p-3 align-items-center' action = "#" method = 'post'>
                    @csrf
                    <div class = 'row'>
                        <div class = 'col'>
                            Name
                        </div>
                        <div class = 'col-6'>
                            {{$userdetail['nama']}}
                        </div>
                    </div>
                    <hr>
                    <div class = 'row'>
                        <div class = 'col'>
                            NIM
                        </div>
                        <div class = 'col-6'>
                            {{$userdetail['nim']}}
                        </div>
                    </div>
                    <hr>
                    <div class = 'row'>
                        <div class = 'col'>
                            Tanggal Lahir
                        </div>
                        <div class = 'col-6'>
                            {{$userdetail['tanggalLahir']}}
                        </div>
                    </div>
                    <hr>
                    <div class = 'row text-center'>
                        <div class = 'col'>
                            Tempat Lahir
                        </div>
                        <div class = 'col-6'>
                            {{$userdetail['tempatLahir']}}
                        </div>
                    </div>
                    <hr>
                    <div class = 'row text-center'>
                        <div class = 'col'>
                            Gender
                        </div>
                        <div class = 'col-6'>
                            {{$userdetail['gender']}}
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>

    {{-- List Hobi --}}
    <div class="row">
        <div class="d-flex mt-3 justify-content-around text-black text-center mb-5 rounded bg-white">
            {{-- Profile Details --}}
            <div class="col w-50 bg-transparent">
                <hr>
                <div class = 'row'>
                    <h1>
                        List Hobi
                    </h1>
                </div>
                <hr>
                @foreach($userhobis as $hobi)
                <div class = 'row'>
                    <p>
                        {{print($hobi['namaHobi'])}}
                    </p>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
