<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pendaftaran</title>
    <link rel='icon' type='image/png' href='image/favicon.png'>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            box-sizing: border-box;
            margin-top: 20px;
        }
        .header-section {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            text-align: center;
            margin-bottom: 20px;
        }
        .header-section div {
            flex: 1;
            margin: 0 20px;
        }
        .header-section div:first-child {
            text-align: center;
        }
        .header-section div:last-child {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .header-section img {
            width: 80px;
            margin: 0 10px;
            transition: transform 0.3s;
        }
        .header-section img:hover {
            transform: scale(1.1);
        }
        .form-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input:focus, .form-group select:focus {
            border-color: #007bff;
            outline: none;
        }
        .btn {
            display: inline-block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .form-column {
                grid-template-columns: 1fr;
            }
            .header-section {
                flex-direction: column;
            }
            .header-section div:last-child {
                margin-top: 20px;
            }
            .header-section img {
                width: 60px;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
        @endif

        <div class="header-section">
            <div>
                <h2>Daftar Akun Baru</h2>
                <p>Silakan isi data di bawah ini untuk mendaftar.</p>
            </div>
            <div>
                <img src="logo1.png" alt="Logo 1">
                <img src="logo2.png" alt="Logo 2">
                <img src="logo3.png" alt="Logo 3">
            </div>
        </div>

        <form action="/register" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-column">
                <div class="form-group">
                    <label for="nik">NIK/Code</label>
                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="NIK" required value="{{ old('nik') }}">
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" placeholder="Pekerjaan" required value="{{ old('pekerjaan') }}">
                    @error('pekerjaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="nama" required value="{{ old('nama') }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_kota">Kota</label>
                    <select class="form-control @error('id_kota') is-invalid @enderror" name="id_kota" id="id_kota" required>
                        <option value="">Pilih Kota</option>
                        @foreach ($kota as $kotas)
                            <option value="{{ $kotas->id }}">{{ $kotas->nama_kota }}</option>
                        @endforeach
                    </select>
                    @error('id_kota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_kecamatan">kecamatan</label>
                    <select class="form-control @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" id="id_kecamatan" required>
                        <option value="">Pilih id_kecamatan</option>
                    </select>
                    @error('id_kecamatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_perkawinan">Status Perkawinan</label>
                    <select name="status_perkawinan" id="status_perkawinan" class="form-control @error('status_perkawinan') is-invalid @enderror" required>
                        <option value="">Pilih Status</option>
                        <option value="0" {{ old('status_perkawinan') == '0' ? 'selected' : '' }}>Belum Menikah</option>
                        <option value="1" {{ old('status_perkawinan') == '1' ? 'selected' : '' }}>Menikah</option>
                    </select>
                    @error('status_perkawinan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pendapatan_perbulan">Pendapatan Perbulan</label>
                    <input type="number" name="pendapatan_perbulan" class="form-control @error('pendapatan_perbulan') is-invalid @enderror" id="pendapatan_perbulan" placeholder="Pendapatan Perbulan" required value="{{ old('pendapatan_perbulan') }}">
                    @error('pendapatan_perbulan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kota_kelahiran">Kota Kelahiran</label>
                    <input type="text" name="kota_kelahiran" class="form-control @error('kota_kelahiran') is-invalid @enderror" id="kota_kelahiran" placeholder="Kota Kelahiran" required value="{{ old('kota_kelahiran') }}">
                    @error('kota_kelahiran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nomer_telfon">Nomor Telepon</label>
                    <input type="tel" name="nomer_telfon" class="form-control @error('nomer_telfon') is-invalid @enderror" id="nomer_telfon" placeholder="Nomor Telepon" required value="{{ old('nomer_telfon') }}">
                    @error('nomer_telfon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                    <input type="text" name="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir" placeholder="Pendidikan Terakhir" required value="{{ old('pendidikan_terakhir') }}">
                    @error('pendidikan_terakhir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_lengkap">Alamat Lengkap</label>
                    <input type="text" name="alamat_lengkap" class="form-control @error('alamat_lengkap') is-invalid @enderror" id="alamat_lengkap" placeholder="Alamat Lengkap" required value="{{ old('alamat_lengkap') }}">
                    @error('alamat_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggungan">Tanggungan</label>
                    <input type="number" name="tanggungan" class="form-control @error('tanggungan') is-invalid @enderror" id="tanggungan" placeholder="Jumlah Tanggungan" required value="{{ old('tanggungan') }}">
                    @error('tanggungan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Foto Profil</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="hidden" name="status_approve" required value="0">
                </div>
                <div class="form-group">
                    <input type="hidden" name="role" required value="2">
                </div>

            </div>
            <button type="submit" class="btn">Daftar</button>
            <div class="login-link">
                <p>Sudah memiliki akun? <a href="/login">Masuk di sini</a></p>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#id_kota').change(function() {
                var kotaId = $(this).val();
                var kecamatanSelect = $('#id_kecamatan');

                kecamatanSelect.empty();
                kecamatanSelect.append('<option value="">Pilih Kecamatan</option>');

                if (kotaId) {
                    $.ajax({
                        url: '/get-kecamatan-by-kota/' + kotaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(index, kecamatan) {
                                kecamatanSelect.append('<option value="' + kecamatan.id + '">' + kecamatan.nama_kecamatan + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            kecamatanSelect.append('<option value="">Gagal memuat kecamatan</option>');
                        }
                    });
                }
            });
        });
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        if (password !== confirmPassword) {
            event.preventDefault(); // Mencegah form dikirim
            alert('Password dan konfirmasi password harus sama.');
        }
    });
    </script>
</body>
</html>
