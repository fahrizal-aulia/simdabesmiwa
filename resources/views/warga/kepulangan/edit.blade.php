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

                <div class="form-group">
                    <label for="no_hp">Nomor HP/WA aktif</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $pulang->no_hp) }}">
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $pulang->pekerjaan) }}">
                    @error('pekerjaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jadwal_kembali" class="form-label">Jadwal Kembali Ke Luar Negeri</label>
                    <div>
                        <input type="checkbox" id="jadwal_kembali_checkbox" {{ old('jadwal_kembali', $pulang->jadwal_kembali) ? 'checked' : '' }}>
                        <label for="jadwal_kembali_checkbox">Ada Jadwal Kembali</label>
                    </div>
                    <input type="date" class="form-control @error('jadwal_kembali') is-invalid @enderror" id="jadwal_kembali" name="jadwal_kembali" value="{{ old('jadwal_kembali', $pulang->jadwal_kembali ? $pulang->jadwal_kembali->format('Y-m-d') : '') }}" {{ old('jadwal_kembali') ? '' : 'disabled' }}>
                    @error('jadwal_kembali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
                    <textarea class="form-control @error('alamat_kepulangan') is-invalid @enderror" id="alamat_kepulangan" name="alamat_kepulangan" rows="3" required>{{ old('alamat_kepulangan', $pulang->alamat_kepulangan) }}</textarea>
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

<script>
    // JavaScript untuk mengaktifkan atau menonaktifkan field jadwal kembali berdasarkan checkbox
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('jadwal_kembali_checkbox');
        const jadwalKembaliInput = document.getElementById('jadwal_kembali');

        // Set the initial state based on checkbox and input value
        function updateJadwalKembaliState() {
            if (checkbox.checked) {
                jadwalKembaliInput.disabled = false;
            } else {
                jadwalKembaliInput.disabled = true;
                jadwalKembaliInput.value = ''; // Clear the value if checkbox is unchecked
            }
        }

        // Listen for changes to the checkbox
        checkbox.addEventListener('change', updateJadwalKembaliState);

        // Initialize the state when the page loads
        updateJadwalKembaliState();
    });
</script>

@endsection
