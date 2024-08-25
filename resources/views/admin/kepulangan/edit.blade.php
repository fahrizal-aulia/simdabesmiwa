@extends('layouts.admin.main')

@section('container')

<div class="container-fluid px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Kepulangan</h1>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i> Form Edit Kepulangan
        </div>
        <div class="card-body">
            <form action="/dashboard/kepulangan/{{ $pulang->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $pulang->user ? $pulang->user->nik : '') }}" disabled>
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $pulang->user ? $pulang->user->nama : '') }}" disabled>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alasan_kepulangan" class="form-label">Alasan Kepulangan</label>
                    <input type="text" class="form-control @error('alasan_kepulangan') is-invalid @enderror" id="alasan_kepulangan" name="alasan_kepulangan" value="{{ old('alasan_kepulangan', $pulang->alasan_kepulangan) }}">
                    @error('alasan_kepulangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat_kepulangan" class="form-label">Alamat Kepulangan</label>
                    <input type="text" class="form-control @error('alamat_kepulangan') is-invalid @enderror" id="alamat_kepulangan" name="alamat_kepulangan" value="{{ old('alamat_kepulangan', $pulang->alamat_kepulangan) }}">
                    @error('alamat_kepulangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_kepulangan" class="form-label">Tanggal Kepulangan</label>
                    <input type="date" class="form-control @error('tanggal_kepulangan') is-invalid @enderror" id="tanggal_kepulangan" name="tanggal_kepulangan" value="{{ old('tanggal_kepulangan', $pulang->tanggal_kepulangan ? $pulang->tanggal_kepulangan->format('Y-m-d') : '') }}">
                    @error('tanggal_kepulangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                    <select class="form-select @error('status_perkawinan') is-invalid @enderror" id="status_perkawinan" name="status_perkawinan">
                        <option value="1" {{ old('status_perkawinan', $pulang->status_perkawinan) ? 'selected' : '' }}>Menikah</option>
                        <option value="0" {{ old('status_perkawinan', $pulang->status_perkawinan) == '0' ? 'selected' : '' }}>Belum Menikah</option>
                    </select>
                    @error('status_perkawinan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="hidden" name="status_approve" required value="1">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update dan Approve</button>
                    <a href="/dashboard/kepulangan" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
