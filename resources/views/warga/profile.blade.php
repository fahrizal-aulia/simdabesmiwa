@extends('layouts.warga.main')

@section('container')

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
        .profile-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
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

        <div class="row">
            <!-- image Profil -->
            <div class="col-md-3 text-center">
                <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/default-profile.png') }}" alt="image Profil" class="profile-photo">
            </div>

            <!-- Informasi Profil -->
            <div class="col-md-9">
                <form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data" onsubmit="return confirmUpdate()">
                    @csrf

                    <!-- NIK -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">NIK:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control-plaintext" id="nik" name="nik" value="{{ $user->nik }}" readonly>
                        </div>
                    </div>

                    <!-- Nama -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Nama Lengkap:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @if(request()->has('edit')) @else form-control-plaintext @endif" id="nama" name="nama" value="{{ $user->nama }}" @if(!request()->has('edit')) readonly @endif>
                        </div>
                    </div>

                    <!-- tempat kelahiran -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Tempat Kelahiran:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @if(request()->has('edit')) @else form-control-plaintext @endif" id="kota_kelahiran" name="kota_kelahiran" value="{{ $user->kota_kelahiran }}" @if(!request()->has('edit')) readonly @endif>
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Tanggal Lahir:</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control @if(request()->has('edit')) @else form-control-plaintext @endif" id="tanggal_lahir" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}" @if(!request()->has('edit')) readonly @endif>
                        </div>
                    </div>

                    <!-- Pekerjaan -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Pekerjaan:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @if(request()->has('edit')) @else form-control-plaintext @endif" id="pekerjaan" name="pekerjaan" value="{{ $user->pekerjaan }}" @if(!request()->has('edit')) readonly @endif>
                        </div>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Nomor Telepon:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @if(request()->has('edit')) @else form-control-plaintext @endif" id="nomer_telfon" name="nomer_telfon" value="{{ $user->nomer_telfon }}" @if(!request()->has('edit')) readonly @endif>
                        </div>
                    </div>

                    <!-- Upload Gambar -->
                    @if(request()->has('edit'))
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bold">Gambar Profil:</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endif

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
        </div>
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
