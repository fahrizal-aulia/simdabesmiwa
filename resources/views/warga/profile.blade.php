@extends('layouts.warga.main')

@section('container')

<!-- resources/views/warga/profile.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-control-plaintext {
            border: none;
            background: transparent;
        }
        .edit-icon {
            cursor: pointer;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Profil Saya</h1>

        <!-- Menampilkan pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile') }}" onsubmit="return confirmUpdate()">
            @csrf

            <!-- NIK -->
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-weight-bold">NIK:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control-plaintext" id="nik" name="nik" value="{{ $user->nik }}" readonly>
                </div>
            </div>

            <!-- Nama -->
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-weight-bold">Nama:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control @if(request()->has('edit')) @else form-control-plaintext @endif" id="nama" name="nama" value="{{ $user->nama }}" @if(!request()->has('edit')) readonly @endif>
                </div>
            </div>

            <!-- Kota Kelahiran -->
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-weight-bold">Kota Kelahiran:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control @if(request()->has('edit')) @else form-control-plaintext @endif" id="kota_kelahiran" name="kota_kelahiran" value="{{ $user->kota_kelahiran }}" @if(!request()->has('edit')) readonly @endif>
                </div>
            </div>

            <!-- Tanggal Lahir -->
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-weight-bold">Tanggal Lahir:</label>
                <div class="col-sm-7">
                    <input type="date" class="form-control @if(request()->has('edit')) @else form-control-plaintext @endif" id="tanggal_lahir" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}" @if(!request()->has('edit')) readonly @endif>
                </div>
            </div>

            <!-- Pekerjaan -->
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-weight-bold">Pekerjaan:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control @if(request()->has('edit')) @else form-control-plaintext @endif" id="pekerjaan" name="pekerjaan" value="{{ $user->pekerjaan }}" @if(!request()->has('edit')) readonly @endif>
                </div>
            </div>

            <!-- Nomer Telfon -->
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-weight-bold">Nomer Telfon:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control @if(request()->has('edit')) @else form-control-plaintext @endif" id="nomer_telfon" name="nomer_telfon" value="{{ $user->nomer_telfon }}" @if(!request()->has('edit')) readonly @endif>
                </div>
            </div>

            <!-- Tombol Edit/Simpan Perubahan -->
            <div class="form-group row">
                <div class="col-sm-12 text-center">
                    @if(request()->has('edit'))
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    @else
                        <a href="{{ route('profile', ['edit' => 'true']) }}" class="btn btn-secondary">Edit Profil</a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <script>
        // Fungsi konfirmasi sebelum menyimpan perubahan
        function confirmUpdate() {
            return confirm('Apakah Anda yakin ingin menyimpan perubahan?');
        }
    </script>
</body>
</html>

@endsection