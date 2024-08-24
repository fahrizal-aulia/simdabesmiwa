@extends('layouts.warga.main')

@section('container')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Formulir Keberangkatan</h3>
        </div>
    </div>
</div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Keberangkatan Baru</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="/keberangkatan" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $users->nik) }}" disabled readonly>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $users->nama ) }}" disabled readonly>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kota">kota/kabupaten</label>
                                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{ old('kota', $users->kota->nama_kota ) }}" disabled readonly>
                                @error('kota')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nomer_telfon">Nomer HP/WA</label>
                                <input type="text" class="form-control @error('nomer_telfon') is-invalid @enderror" id="nomer_telfon" name="nomer_telfon" value="{{ old('nomer_telfon', $users->nomer_telfon ) }}" disabled readonly>
                                @error('nomer_telfon')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggungan">Tanggungan Keluarga</label>
                                <input type="text" class="form-control @error('tanggungan') is-invalid @enderror" id="tanggungan" name="tanggungan" value="{{ old('tanggungan', $users->tanggungan ) }}" disabled readonly>
                                @error('tanggungan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" value="{{ old('nama_perusahaan') }}" required>
                                @error('nama_perusahaan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="negara_tujuan">Negara Tujuan</label>
                                <input type="text" id="negara_tujuan" name="negara_tujuan" class="form-control" value="{{ old('negara_tujuan') }}" required>
                                @error('negara_tujuan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                                <input type="date" id="tanggal_keberangkatan" name="tanggal_keberangkatan" class="form-control" value="{{ old('tanggal_keberangkatan') }}" required>
                                @error('tanggal_keberangkatan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                                <input type="text" id="jenis_pekerjaan" name="jenis_pekerjaan" class="form-control" value="{{ old('jenis_pekerjaan') }}" required>
                                @error('jenis_pekerjaan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat_di_luar_negeri">Alamat di Luar Negeri</label>
                                <textarea id="alamat_di_luar_negeri" name="alamat_di_luar_negeri" class="form-control" rows="3" required>{{ old('alamat_di_luar_negeri') }}</textarea>
                                @error('alamat_di_luar_negeri')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status_perkawinan">Status Perkawinan</label>
                                <select id="status_perkawinan" name="status_perkawinan" class="form-control" required>
                                    <option value="1" {{ old('status_perkawinan') == '1' ? 'selected' : '' }}>Menikah</option>
                                    <option value="0" {{ old('status_perkawinan') == '0' ? 'selected' : '' }}>Belum Menikah</option>
                                </select>
                                @error('status_perkawinan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="biaya_pemberangkatan">Biaya Pemberangkatan</label>
                                <input type="number" id="biaya_pemberangkatan" name="biaya_pemberangkatan" class="form-control" value="{{ old('biaya_pemberangkatan') }}" step="0.01" required>
                                @error('biaya_pemberangkatan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="masa_kontrak">Masa Kontrak (bulan)</label>
                                <input type="number" id="masa_kontrak" name="masa_kontrak" class="form-control" value="{{ old('masa_kontrak') }}" required>
                                @error('masa_kontrak')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gaji_perbulan">Gaji Per Bulan</label>
                                <input type="number" id="gaji_perbulan" name="gaji_perbulan" class="form-control" value="{{ old('gaji_perbulan') }}" step="0.01" required>
                                @error('gaji_perbulan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="asuransi">Asuransi</label>
                                <input type="text" id="asuransi" name="asuransi" class="form-control" value="{{ old('asuransi') }}" required>
                                @error('asuransi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
