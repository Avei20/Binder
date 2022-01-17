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
                        {{$hobi['namaHobi']}}
                    </p>
                </div>
                <hr>
                @endforeach
                @if ($nimQuery == Auth::id())
                    <div class = 'row align-items-center justify-content-center'>
                        <button type="button" class="col-sm-3 text-center btn btn-primary" data-bs-toggle="modal" data-bs-target="#addHobi" href="#">
                            Tambah Hobi
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Modal Tambah Hobi --}}
    <form class="modal" tabindex="-1"  id="addHobi" action=# method="get">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-black">
                    <h4> Tambah Hobi Baru </h4>
                </div>

                <div class="modal-body text-black">
                    <p class = "form-floating text-black">
                        <input type="text" class = "form-control text-black" name="namaHobi">
                        <label for="namaHobi">Nama Hobi</label>
                    </p>
                </div>
                <div class="modal-footer">
                    <p><input type="submit" class = "bg-secondary text-white" value="Tambah Hobi"></p>
                </div>
            </div>
        </div>
    </form>

    {{-- List Alamat --}}
    <div class="row">
        <div class="d-flex mt-3 justify-content-around text-black text-center mb-5 rounded bg-white">
            <div class="col w-50 bg-transparent">
                <hr>
                <div class = 'row'>
                    <h1>
                        List Alamat
                    </h1>
                </div>
                <hr>
                <div class = 'row'>
                    <div class = 'col'>
                        Nama Jalan
                    </div>
                    <div class = 'col'>
                        {{$useralamat['namaJalan']}}
                    </div>
                </div>
                <hr>
                <div class = 'row'>
                    <div class = 'col'>
                        Kecamatan
                    </div>
                    <div class = 'col'>
                        {{$useralamat['Kecamatan']}}
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
