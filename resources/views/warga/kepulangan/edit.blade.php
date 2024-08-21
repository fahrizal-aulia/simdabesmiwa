@extends('layouts.warga.main')

@section('container')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Kepulangan</h3>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Informasi Kepulangan</h4>
        </div>
        <div class="card-body">
            <form action="/kepulangan/{{ $pulang->id }}" method="POST">
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
                    <label for="tanggal_kepulangan">Tanggal Kepulangan</label>
                    <input type="date" class="form-control @error('tanggal_kepulangan') is-invalid @enderror" id="tanggal_kepulangan" name="tanggal_kepulangan" value="{{ old('tanggal_kepulangan', $pulang->tanggal_kepulangan->format('Y-m-d')) }}" required>
                    @error('tanggal_kepulangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status_perkawinan">Status Perkawinan</label>
                    <select class="form-control @error('status_perkawinan') is-invalid @enderror" id="status_perkawinan" name="status_perkawinan" required>
                        <option value="1" {{ old('status_perkawinan', $pulang->status_perkawinan) == 1 ? 'selected' : '' }}>Menikah</option>
                        <option value="0" {{ old('status_perkawinan', $pulang->status_perkawinan) == 0 ? 'selected' : '' }}>Belum Menikah</option>
                    </select>
                    @error('status_perkawinan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                    <!-- Alasan Kepulangan -->
                <div class="form-group">
                    <label for="alasan_kepulangan">Jadwal Kembali Keluar Negeri:</label>
                    <textarea class="form-control" id="alasan_kepulangan" name="alasan_kepulangan" rows="3" required></textarea>
                </div>
                <!-- Alasan Kepulangan -->
                <div class="form-group">
                    <label for="alasan_kepulangan">Nomer Hp aktif:</label>
                    <textarea class="form-control" id="alasan_kepulangan" name="alasan_kepulangan" rows="3" required></textarea>
                </div>
                <!-- Alasan Kepulangan -->
                <div class="form-group">
                    <label for="alasan_kepulangan">Pekerjaan</label>
                    <textarea class="form-control" id="alasan_kepulangan" name="alasan_kepulangan" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="alasan_kepulangan">Alasan Kepulangan</label>
                    <textarea class="form-control @error('alasan_kepulangan') is-invalid @enderror" id="alasan_kepulangan" name="alasan_kepulangan" rows="3" required>{{ old('alasan_kepulangan', $pulang->alasan_kepulangan) }}</textarea>
                    @error('alasan_kepulangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat_kepulangan">Alamat Kepulangan</label>
                    <input type="text" class="form-control @error('alamat_kepulangan') is-invalid @enderror" id="alamat_kepulangan" name="alamat_kepulangan" value="{{ old('alamat_kepulangan', $pulang->alamat_kepulangan) }}" required>
                    @error('alamat_kepulangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="hidden" name="status_approve" value="1">
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
