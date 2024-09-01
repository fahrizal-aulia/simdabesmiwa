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
        .profile-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }
        .readonly-input {
            border: none;
            background-color: #e9ecef;
            padding: 0.375rem 0.75rem;
        }
        .form-ganti-password {
            display: none; /* Initial state hidden */
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
            <!-- Image Profil -->
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
                            <input type="text" class="form-control-plaintext readonly-input" id="nik" name="nik" value="{{ $user->nik }}" readonly>
                        </div>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Nama Lengkap:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @if(request()->has('edit')) @else readonly-input @endif" id="nama" name="nama" value="{{ $user->nama }}" @if(!request()->has('edit')) readonly @endif>
                        </div>
                    </div>

                    <!-- Kota/Kabupaten -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Kota/Kabupaten:</label>
                        <div class="col-sm-8">
                            @if(request()->has('edit'))
                                <select class="form-control @error('id_kota') is-invalid @enderror" id="id_kota" name="id_kota" required>
                                    <option value="">Pilih Kota</option>
                                    @foreach ($kotas as $kotaItem)
                                        <option value="{{ $kotaItem->id }}" {{ old('id_kota', $user->id_kota) == $kotaItem->id ? 'selected' : '' }}>{{ $kotaItem->nama_kota }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" class="form-control-plaintext readonly-input" value="{{ $user->kota->nama_kota }}" readonly>
                            @endif
                        </div>
                    </div>

                    <!-- Kecamatan -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Kecamatan:</label>
                        <div class="col-sm-8">
                            @if(request()->has('edit'))
                                <select class="form-control @error('id_kecamatan') is-invalid @enderror" id="id_kecamatan" name="id_kecamatan" required>
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kecamatans as $kecamatanItem)
                                        <option value="{{ $kecamatanItem->id }}" {{ old('id_kecamatan', $user->id_kecamatan) == $kecamatanItem->id ? 'selected' : '' }}>{{ $kecamatanItem->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" class="form-control-plaintext readonly-input" value="{{ $user->kecamatan->nama_kecamatan }}" readonly>
                            @endif
                        </div>
                    </div>

                    <!-- Tempat Kelahiran -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Tempat Kelahiran:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @if(request()->has('edit')) @else readonly-input @endif" id="kota_kelahiran" name="kota_kelahiran" value="{{ $user->kota_kelahiran }}" @if(!request()->has('edit')) readonly @endif>
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Jenis Kelamin:</label>
                        <div class="col-sm-8">
                            @if(request()->has('edit'))
                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            @else
                                <input type="text" class="form-control-plaintext readonly-input" value="{{ $user->jenis_kelamin == 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}" readonly>
                            @endif
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Tanggal Lahir:</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control @if(request()->has('edit')) @else readonly-input @endif" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', \Carbon\Carbon::parse($user->tanggal_lahir)->format('Y-m-d')) }}" @if(!request()->has('edit')) readonly @endif>
                        </div>
                    </div>

                    <!-- Pekerjaan -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Pekerjaan:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @if(request()->has('edit')) @else readonly-input @endif" id="pekerjaan" name="pekerjaan" value="{{ $user->pekerjaan }}" @if(!request()->has('edit')) readonly @endif>
                        </div>
                    </div>

                    <!-- Status Perkawinan -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Status Perkawinan:</label>
                        <div class="col-sm-8">
                            @if(request()->has('edit'))
                                <select class="form-control @error('status_perkawinan') is-invalid @enderror" id="status_perkawinan" name="status_perkawinan" required>
                                    <option value="1" {{ old('status_perkawinan', $user->status_perkawinan) == '1' ? 'selected' : '' }}>Menikah</option>
                                    <option value="0" {{ old('status_perkawinan', $user->status_perkawinan) == '0' ? 'selected' : '' }}>Belum Menikah</option>
                                </select>
                            @else
                                <input type="text" class="form-control-plaintext readonly-input" value="{{ $user->status_perkawinan == '1' ? 'Menikah' : 'Belum Menikah' }}" readonly>
                            @endif
                        </div>
                    </div>

                    <!-- Pendapatan Perbulan -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Pendapatan Perbulan:</label>
                        <div class="col-sm-8">
                            @if(request()->has('edit'))
                                <input type="number" class="form-control @error('pendapatan_perbulan') is-invalid @enderror" id="pendapatan_perbulan" name="pendapatan_perbulan" value="{{ old('pendapatan_perbulan', $user->pendapatan_perbulan) }}" required>
                            @else
                                <input type="text" class="form-control-plaintext readonly-input" value="Rp {{ number_format($user->pendapatan_perbulan, 2, ',', '.') }}" readonly>
                            @endif
                        </div>
                    </div>

                    <!-- Pendidikan Terakhir -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Pendidikan Terakhir:</label>
                        <div class="col-sm-8">
                            @if(request()->has('edit'))
                                <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $user->pendidikan_terakhir) }}" required>
                                @error('pendidikan_terakhir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @else
                                <input type="text" class="form-control-plaintext readonly-input" value="{{ $user->pendidikan_terakhir }}" readonly>
                            @endif
                        </div>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Nomor Telepon:</label>
                        <div class="col-sm-8">
                            @if(request()->has('edit'))
                                <input type="text" class="form-control @error('nomer_telfon') is-invalid @enderror" id="nomer_telfon" name="nomer_telfon" value="{{ old('nomer_telfon', $user->nomer_telfon) }}" required>
                                @error('nomer_telfon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @else
                                <input type="text" class="form-control-plaintext readonly-input" value="{{ $user->nomer_telfon }}" readonly>
                            @endif
                        </div>
                    </div>

                    <!-- Tanggungan Anak/Keluarga -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Tanggungan Anak/Keluarga:</label>
                        <div class="col-sm-8">
                            @if(request()->has('edit'))
                                <input type="number" class="form-control @error('tanggungan') is-invalid @enderror" id="tanggungan" name="tanggungan" value="{{ old('tanggungan', $user->tanggungan) }}" required>
                            @else
                                <input type="text" class="form-control-plaintext readonly-input" value="{{ $user->tanggungan }}" readonly>
                            @endif
                        </div>
                    </div>

                    <!-- Alamat Lengkap -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label font-weight-bold">Alamat Lengkap (RT, RW, desa):</label>
                        <div class="col-sm-8">
                            @if(request()->has('edit'))
                                <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" id="alamat_lengkap" name="alamat_lengkap" rows="3" required>{{ old('alamat_lengkap', $user->alamat_lengkap) }}</textarea>
                            @else
                                <textarea class="form-control-plaintext readonly-input" rows="3" readonly>{{ $user->alamat_lengkap }}</textarea>
                            @endif
                        </div>
                    </div>

                    <!-- Upload Foto -->
                    @if(request()->has('edit'))
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bold">Upload Foto:</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @if($user->image)
                                    <img src="{{ asset('storage/' . $user->image) }}" alt="Foto" class="img-thumbnail mt-2" width="100">
                                @endif
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @else
                        <input type="text" class="form-control-plaintext readonly-input" value="* Foto hanya bisa diubah di mode edit." readonly>
                    @endif

                    <!-- Ganti Password -->
                    @if(request()->has('edit'))
                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="change_password" onclick="togglePasswordFields()">
                                    <label class="form-check-label" for="change_password">
                                        Ganti Password
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-ganti-password">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label font-weight-bold">Password Lama:</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password">
                                    @error('old_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label font-weight-bold">Password Baru:</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password">
                                    <div class="invalid-feedback" id="new_password_feedback"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label font-weight-bold">Konfirmasi Password Baru:</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" name="new_password_confirmation">
                                    <div class="invalid-feedback" id="new_password_confirmation_feedback"></div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <div class="col-sm-8 offset-sm-4">
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
{{--
    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

    <!-- Include custom validation script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newPassword = document.getElementById('new_password');
            const confirmPassword = document.getElementById('new_password_confirmation');
            const form = document.querySelector('form');
            const changePasswordCheckbox = document.getElementById('change_password');
            const passwordFields = document.querySelectorAll('.form-ganti-password input');

            function validatePasswords() {
                const feedbackPassword = document.getElementById('new_password_feedback');
                const feedbackConfirmPassword = document.getElementById('new_password_confirmation_feedback');
                const submitButton = form.querySelector('button[type="submit"]');

                if (newPassword.value !== confirmPassword.value) {
                    feedbackPassword.textContent = 'Passwords do not match.';
                    feedbackConfirmPassword.textContent = 'Passwords do not match.';
                    confirmPassword.classList.add('is-invalid');
                    submitButton.disabled = true;
                } else {
                    feedbackPassword.textContent = '';
                    feedbackConfirmPassword.textContent = '';
                    confirmPassword.classList.remove('is-invalid');
                    submitButton.disabled = false;
                }
            }

            function togglePasswordFields() {
                const isChecked = changePasswordCheckbox.checked;
                document.querySelector('.form-ganti-password').style.display = isChecked ? 'block' : 'none';
                passwordFields.forEach(field => field.required = isChecked);
            }

            newPassword.addEventListener('input', validatePasswords);
            confirmPassword.addEventListener('input', validatePasswords);
            changePasswordCheckbox.addEventListener('change', togglePasswordFields);

            validatePasswords();
            togglePasswordFields(); // Initialize visibility based on checkbox status
        });

        function confirmUpdate() {
            return confirm('Apakah Anda yakin ingin menyimpan perubahan?');
        }
    </script>

    <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include custom validation script -->
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
                        console.log(data); // Debugging: Check what data is being returned
                        $.each(data, function(index, kecamatan) {
                            kecamatanSelect.append('<option value="' + kecamatan.id + '">' + kecamatan.nama_kecamatan + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Debugging: Check for errors in the response
                        kecamatanSelect.append('<option value="">Gagal memuat kecamatan</option>');
                    }
                });
            }
        });
    });
</script>

</body>
</html>


@endsection
