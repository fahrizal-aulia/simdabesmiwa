@extends('layouts.admin.main')

@section('container')

<div class="container-fluid px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data keberangkatan</h1>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i> Form Edit keberangkatan
        </div>
        <div class="card-body">
            <form action="/dashboard/keberangkatan/{{ $berangkat->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $berangkat->user->nik) }}" disabled>
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $berangkat->user->nama) }}" disabled>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan', $berangkat->nama_perusahaan) }}">
                    @error('nama_perusahaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="negara_tujuan" class="form-label">Negara Tujuan</label>
                    <input type="text" class="form-control @error('negara_tujuan') is-invalid @enderror" id="negara_tujuan" name="negara_tujuan" value="{{ old('negara_tujuan', $berangkat->negara_tujuan) }}">
                    @error('negara_tujuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_keberangkatan" class="form-label">Tanggal Keberangkatan</label>
                    <input type="date" class="form-control @error('tanggal_keberangkatan') is-invalid @enderror" id="tanggal_keberangkatan" name="tanggal_keberangkatan" value="{{ old('tanggal_keberangkatan', $berangkat->tanggal_keberangkatan ? $berangkat->tanggal_keberangkatan->format('Y-m-d') : '') }}">
                    @error('tanggal_keberangkatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan</label>
                    <input type="text" class="form-control @error('jenis_pekerjaan') is-invalid @enderror" id="jenis_pekerjaan" name="jenis_pekerjaan" value="{{ old('jenis_pekerjaan', $berangkat->jenis_pekerjaan) }}">
                    @error('jenis_pekerjaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat_di_luar_negeri" class="form-label">Alamat di Luar Negeri</label>
                    <textarea class="form-control @error('alamat_di_luar_negeri') is-invalid @enderror" id="alamat_di_luar_negeri" name="alamat_di_luar_negeri" rows="3" required>{{ old('alamat_di_luar_negeri', $berangkat->alamat_di_luar_negeri) }}</textarea>
                    @error('alamat_di_luar_negeri')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                    <select class="form-select @error('status_perkawinan') is-invalid @enderror" id="status_perkawinan" name="status_perkawinan">
                        <option value="1" {{ old('status_perkawinan', $berangkat->status_perkawinan) ? 'selected' : '' }}>Menikah</option>
                        <option value="0" {{ old('status_perkawinan', $berangkat->status_perkawinan) == '0' ? 'selected' : '' }}>Belum Menikah</option>
                    </select>
                    @error('status_perkawinan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="biaya_pemberangkatan" class="form-label">Biaya Pemberangkatan (IDR)</label>
                    <input type="number" class="form-control @error('biaya_pemberangkatan') is-invalid @enderror" id="biaya_pemberangkatan" name="biaya_pemberangkatan" value="{{ old('biaya_pemberangkatan', $berangkat->biaya_pemberangkatan) }}">
                    @error('biaya_pemberangkatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="masa_kontrak" class="form-label">Masa Kontrak (bulan)</label>
                    <input type="number" class="form-control @error('masa_kontrak') is-invalid @enderror" id="masa_kontrak" name="masa_kontrak" value="{{ old('masa_kontrak', $berangkat->masa_kontrak) }}">
                    @error('masa_kontrak')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gaji_perbulan" class="form-label">Gaji Per Bulan (IDR)</label>
                    <input type="number" class="form-control @error('gaji_perbulan') is-invalid @enderror" id="gaji_perbulan" name="gaji_perbulan" value="{{ old('gaji_perbulan', $berangkat->gaji_perbulan) }}">
                    @error('gaji_perbulan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="asuransi" class="form-label">Asuransi</label>
                    <input type="text" class="form-control @error('asuransi') is-invalid @enderror" id="asuransi" name="asuransi" value="{{ old('asuransi', $berangkat->asuransi) }}">
                    @error('asuransi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @if ($berangkat->image)
                        <img src="{{ asset('storage/' . $berangkat->image) }}" alt="Current Image" class="mt-2" style="width: 150px; height: auto;">
                    @endif
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}

                <div class="form-group">
                    <input type="hidden" name="status_approve" required value="1">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update dan Approve</button>
                    <a href="/dashboard/keberangkatan" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
