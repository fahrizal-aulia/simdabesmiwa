@extends('layouts.admin.main')

@section('container')

<div class="container-fluid px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Warga</h1>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i> Form Edit Warga
        </div>
        <div class="card-body">
            <form action="/dashboard/warga/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $user->nik) }}" do>
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $user->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Alamat Lengkap, RT, RW, Desa -->
                <div class="mb-3">
                    <label for="alamat_lengkap" class="form-label">Alamat Lengkap (RT, RW, desa)</label>
                    <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" id="alamat_lengkap" name="alamat_lengkap" rows="3">{{ old('alamat_lengkap', $user->alamat_lengkap) }}</textarea>
                    @error('alamat_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Kota/Kabupaten -->
                <div class="mb-3">
                    <label for="id_kota" class="form-label">Kota/Kabupaten</label>
                    <select class="form-control @error('id_kota') is-invalid @enderror" name="id_kota" id="id_kota" required>
                        <option value="">Pilih Kota</option>
                        @foreach ($kota as $kota)
                            <option value="{{ $kota->id }}" {{ old('id_kota', $user->id_kota) == $kota->id ? 'selected' : '' }}>{{ $kota->nama_kota }}</option>
                        @endforeach
                    </select>
                    @error('id_kota')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Kecamatan -->
                <div class="mb-3">
                    <label for="id_kecamatan" class="form-label">Kecamatan</label>
                    <select class="form-control @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" id="id_kecamatan" required>
                        <option value="">Pilih Kecamatan</option>
                        @foreach ($kecamatan as $kecamatan)
                            <option value="{{ $kecamatan->id }}" {{ old('id_kecamatan', $user->id_kecamatan) == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->nama_kecamatan }}</option>
                        @endforeach
                    </select>
                    @error('id_kecamatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Nomor HP/WA Aktif -->
                <div class="mb-3">
                    <label for="nomer_telfon" class="form-label">Nomor HP/WA Aktif</label>
                    <input type="text" class="form-control @error('nomer_telfon') is-invalid @enderror" id="nomer_telfon" name="nomer_telfon" value="{{ old('nomer_telfon', $user->nomer_telfon) }}">
                    @error('nomer_telfon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Tempat Lahir -->
                <div class="mb-3">
                    <label for="kota_kelahiran" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control @error('kota_kelahiran') is-invalid @enderror" id="kota_kelahiran" name="kota_kelahiran" value="{{ old('kota_kelahiran', $user->kota_kelahiran) }}">
                    @error('kota_kelahiran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir ? $user->tanggal_lahir->format('Y-m-d') : '') }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Pekerjaan -->
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $user->pekerjaan) }}">
                    @error('pekerjaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Status Perkawinan -->
                <div class="mb-3">
                    <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                    <select class="form-select @error('status_perkawinan') is-invalid @enderror" id="status_perkawinan" name="status_perkawinan">
                        <option value="1" {{ old('status_perkawinan', $user->status_perkawinan) == '1' ? 'selected' : '' }}>Menikah</option>
                        <option value="0" {{ old('status_perkawinan', $user->status_perkawinan) == '0' ? 'selected' : '' }}>Belum Menikah</option>
                    </select>
                    @error('status_perkawinan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Pendapatan Perbulan -->
                <div class="mb-3">
                    <label for="pendapatan_perbulan" class="form-label">Pendapatan Perbulan (IDR)</label>
                    <input type="number" class="form-control @error('pendapatan_perbulan') is-invalid @enderror" id="pendapatan_perbulan" name="pendapatan_perbulan" value="{{ old('pendapatan_perbulan', $user->pendapatan_perbulan) }}">
                    @error('pendapatan_perbulan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Pendidikan Terakhir -->
                <div class="mb-3">
                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                    <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $user->pendidikan_terakhir) }}">
                    @error('pendidikan_terakhir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Tanggungan Anak/Keluarga -->
                <div class="mb-3">
                    <label for="tanggungan" class="form-label">Tanggungan Anak/Keluarga</label>
                    <input type="number" class="form-control @error('tanggungan') is-invalid @enderror" id="tanggungan" name="tanggungan" value="{{ old('tanggungan', $user->tanggungan) }}">
                    @error('tanggungan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Gambar Foto -->
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Foto</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @if ($user->image)
                        <img src="{{ asset('storage/' . $user->image) }}" alt="Current Image" class="mt-2" style="width: 150px; height: auto;">
                    @endif
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Status Approve (hidden) -->
                <input type="hidden" name="status_approve" value="1">

                <!-- Submit and Cancel Buttons -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/dashboard/warga" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JQuery and Dynamic Kecamatan Loading -->
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
                    url: '/warget-kecamatan-by-kota/' + kotaId,
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
</script>

@endsection
