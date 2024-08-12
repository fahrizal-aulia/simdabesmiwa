@extends('layouts.warga.main')

@section('container')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Keberangkatan</h3>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Informasi Keberangkatan</h4>
        </div>
        <div class="card-body">
            <form action="/keberangkatan/{{ $berangkat->id }}" method="POST">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $berangkat->user->nik) }}" required disabled>
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $berangkat->user->nama) }}" required disabled>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan', $berangkat->nama_perusahaan) }}" required>
                    @error('nama_perusahaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="negara_tujuan">Negara Tujuan</label>
                    <input type="text" class="form-control @error('negara_tujuan') is-invalid @enderror" id="negara_tujuan" name="negara_tujuan" value="{{ old('negara_tujuan', $berangkat->negara_tujuan) }}" required>
                    @error('negara_tujuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                    <input type="date" class="form-control @error('tanggal_keberangkatan') is-invalid @enderror" id="tanggal_keberangkatan" name="tanggal_keberangkatan" value="{{ old('tanggal_keberangkatan', $berangkat->tanggal_keberangkatan->format('Y-m-d')) }}" required>
                    @error('tanggal_keberangkatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                    <input type="text" class="form-control @error('jenis_pekerjaan') is-invalid @enderror" id="jenis_pekerjaan" name="jenis_pekerjaan" value="{{ old('jenis_pekerjaan', $berangkat->jenis_pekerjaan) }}" required>
                    @error('jenis_pekerjaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat_di_luar_negeri">Alamat di Luar Negeri</label>
                    <textarea class="form-control @error('alamat_di_luar_negeri') is-invalid @enderror" id="alamat_di_luar_negeri" name="alamat_di_luar_negeri" rows="3" required>{{ old('alamat_di_luar_negeri', $berangkat->alamat_di_luar_negeri) }}</textarea>
                    @error('alamat_di_luar_negeri')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status_perkawinan">Status Perkawinan</label>
                    <select class="form-control @error('status_perkawinan') is-invalid @enderror" id="status_perkawinan" name="status_perkawinan" required>
                        <option value="1" {{ old('status_perkawinan', $berangkat->status_perkawinan) == 1 ? 'selected' : '' }}>Menikah</option>
                        <option value="0" {{ old('status_perkawinan', $berangkat->status_perkawinan) == 0 ? 'selected' : '' }}>Belum Menikah</option>
                    </select>
                    @error('status_perkawinan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="biaya_pemberangkatan">Biaya Pemberangkatan</label>
                    <input type="number" class="form-control @error('biaya_pemberangkatan') is-invalid @enderror" id="biaya_pemberangkatan" name="biaya_pemberangkatan" value="{{ old('biaya_pemberangkatan', $berangkat->biaya_pemberangkatan) }}" required>
                    @error('biaya_pemberangkatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="masa_kontrak">Masa Kontrak (bulan)</label>
                    <input type="number" class="form-control @error('masa_kontrak') is-invalid @enderror" id="masa_kontrak" name="masa_kontrak" value="{{ old('masa_kontrak', $berangkat->masa_kontrak) }}" required>
                    @error('masa_kontrak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gaji_perbulan">Gaji Per Bulan</label>
                    <input type="number" class="form-control @error('gaji_perbulan') is-invalid @enderror" id="gaji_perbulan" name="gaji_perbulan" value="{{ old('gaji_perbulan', $berangkat->gaji_perbulan) }}" required>
                    @error('gaji_perbulan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="asuransi">Asuransi</label>
                    <input type="text" class="form-control @error('asuransi') is-invalid @enderror" id="asuransi" name="asuransi" value="{{ old('asuransi', $berangkat->asuransi) }}" required>
                    @error('asuransi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="hidden" name="status_approve" required value="1">
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
