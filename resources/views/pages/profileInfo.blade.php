@extends('layout.nav')

@section('content')

    {{-- Profile Info --}}
    <div class="row">
        <div class="d-flex mt-3 justify-content-around text-black text-center mb-5 rounded bg-white p-3">

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
                            Nama
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
                </form>
                <hr>
                {{-- Cek kalau nim sama dengan yang diquery, cek kalau yang di query dah ada match, dan cek kalau user dah ada match --}}
                {{-- {{dd($userdetail['matched'])}} --}}


                @if(!($nimQuery == Auth::id()) && ($userdetail['matched'] == "False") && ($authuser['matched'] == "False"))
                    <form class = 'row align-items-center justify-content-center' action={{route("profileinfo.match")}} method='post'>
                        @csrf
                        <input type='hidden' name='nimMatched' value={{$userdetail['nim']}}>
                        <button type="submit" class="col-sm-3 text-center btn btn-primary">
                            Send Match Request
                        </button>
                    </form>
                @elseif($userdetail['matched'] == "True")
                    <div class = 'row text-center'>
                        <div class = 'col'>
                            Matched NIM
                        </div>
                        <div class = 'col-6'>
                            <a class = 'btn btn-primary' href={{route('profileinfo', ['nim' => $userdetail['matchedNim']])}}>
                                {{$userdetail['matchedNim']}}
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- List Hobi --}}
    <div class="row">
        <div class="d-flex mt-3 justify-content-around text-black text-center mb-5 rounded bg-white p-3">
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
    <form class="modal" tabindex="-1"  id="addHobi" action={{route("profileinfo.tambahHobi")}} method="post">
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
                    <p><input type="submit" class = "bg-secondary text-white btn" value="Tambah Hobi"></p>
                </div>
            </div>
        </div>
    </form>

    {{-- List Alamat --}}
    <div class="row">
        <div class="d-flex mt-3 justify-content-around text-black text-center mb-5 rounded bg-white p-3">
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
                        {{$useralamat['kecamatan']}}
                    </div>
                </div>
                <hr>
                <div class = 'row'>
                    <div class = 'col'>
                        Kota
                    </div>
                    <div class = 'col'>
                        {{$useralamat['kota']}}
                    </div>
                </div>
                <hr>
                <div class = 'row'>
                    <div class = 'col'>
                        Provinsi
                    </div>
                    <div class = 'col'>
                        {{$useralamat['provinsi']}}
                    </div>
                </div>
                <hr>
                @if ($nimQuery == Auth::id())
                    <div class = 'row align-items-center justify-content-center'>
                        <button type="button" class="col-sm-3 text-center btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateAlamat" href="#">
                            Update Alamat
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Modal Update Alamat --}}
    <form class="modal" tabindex="-1"  id="updateAlamat" action={{route("profileinfo.updateAlamat")}} method="post">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-black">
                    <h4> Update Alamat </h4>
                </div>

                <div class="modal-body text-black">
                    <p class = "form-floating text-black">
                        <input type="text" class = "form-control text-black" name="namaJalan">
                        <label for="namaJalan">Nama Jalan</label>
                    </p>
                    <p class = "form-floating text-black">
                        <input type="text" class = "form-control text-black" name="kecamatan">
                        <label for="kecamatan">Kecamatan</label>
                    </p>
                    <p class = "form-floating text-black">
                        <input type="text" class = "form-control text-black" name="kota">
                        <label for="kota">Kota</label>
                    </p>
                    <p class = "form-floating text-black">
                        <input type="text" class = "form-control text-black" name="provinsi">
                        <label for="provinsi">Provinsi</label>
                    </p>
                </div>
                <div class="modal-footer">
                    <p><input type="submit" class = "bg-secondary text-white btn" value="Update Alamat"></p>
                </div>
            </div>
        </div>
    </form>

    {{-- List Contact --}}
    <div class="row">
        <div class="d-flex mt-3 justify-content-around text-black text-center mb-5 rounded bg-white p-3">
            <div class="col w-50 bg-transparent">
                <hr>
                <div class = 'row'>
                    <h1>
                        List Contact
                    </h1>
                </div>
                <hr>
                <div class = 'row'>
                    <div class = 'col'>
                        Line
                    </div>
                    <div class = 'col'>
                        {{$usercontact['line']}}
                    </div>
                </div>
                <hr>
                <div class = 'row'>
                    <div class = 'col'>
                        Instagram
                    </div>
                    <div class = 'col'>
                        {{$usercontact['instagram']}}
                    </div>
                </div>
                <hr>
                <div class = 'row'>
                    <div class = 'col'>
                        Whatsapp
                    </div>
                    <div class = 'col'>
                        {{$usercontact['whatsapp']}}
                    </div>
                </div>
                <hr>
                <div class = 'row'>
                    <div class = 'col'>
                        Facebook
                    </div>
                    <div class = 'col'>
                        {{$usercontact['facebook']}}
                    </div>
                </div>
                <hr>
                <div class = 'row'>
                    <div class = 'col'>
                        Twitter
                    </div>
                    <div class = 'col'>
                        {{$usercontact['twitter']}}
                    </div>
                </div>
                <hr>
                <div class = 'row'>
                    <div class = 'col'>
                        Snapchat
                    </div>
                    <div class = 'col'>
                        {{$usercontact['snapchat']}}
                    </div>
                </div>
                <hr>
                @if ($nimQuery == Auth::id())
                    <div class = 'row align-items-center justify-content-center'>
                        <button type="button" class="col-sm-3 text-center btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateContact" href="#">
                            Update Contact
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Modal Update Contact --}}
    <form class="modal" tabindex="-1"  id="updateContact" action={{route("profileinfo.updateContact")}} method="post">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-black">
                    <h4> Update Contact </h4>
                </div>

                <div class="modal-body text-black">
                    <p class = "form-floating text-black">
                        <input type="text" class = "form-control text-black" name="line">
                        <label for="line">Line</label>
                    </p>
                    <p class = "form-floating text-black">
                        <input type="text" class = "form-control text-black" name="instagram">
                        <label for="instagram">Instagram</label>
                    </p>
                    <p class = "form-floating text-black">
                        <input type="text" class = "form-control text-black" name="whatsapp">
                        <label for="whatsapp">Whatsapp</label>
                    </p>
                    <p class = "form-floating text-black">
                        <input type="text" class = "form-control text-black" name="facebook">
                        <label for="facebook">Facebook</label>
                    </p>
                    <p class = "form-floating text-black">
                        <input type="text" class = "form-control text-black" name="twitter">
                        <label for="twitter">Twitter</label>
                    </p>
                    <p class = "form-floating text-black">
                        <input type="text" class = "form-control text-black" name="snapchat">
                        <label for="snapchat">Snapchat</label>
                    </p>
                </div>
                <div class="modal-footer">
                    <p><input type="submit" class = "bg-secondary text-white btn" value="Update Contact"></p>
                </div>
            </div>
        </div>
    </form>

@endsection
