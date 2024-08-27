@extends('layouts.warga.main')

@section('container')

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Kepulangan</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Tambah Data Kepulangan</h1>

        <!-- Form untuk menambah data kepulangan -->
        <form method="POST" action="/kepulangan">
            @csrf

            <!-- Tanggal Kepulangan -->
            <div class="form-group">
                <label for="tanggal_kepulangan">Tanggal Kepulangan:</label>
                <input type="date" class="form-control" id="tanggal_kepulangan" name="tanggal_kepulangan" required>
            </div>

            <!-- Status Perkawinan -->
            <div class="form-group">
                <label for="status_perkawinan">Status Perkawinan:</label>
                <select class="form-control" id="status_perkawinan" name="status_perkawinan" required>
                    <option value="0">Belum Menikah</option>
                    <option value="1">Sudah Menikah</option>
                </select>
            </div>

            <!-- Checkbox untuk Jadwal Kembali -->
            <div class="form-group">
                <label for="has_jadwal_kembali">
                    <input type="checkbox" id="has_jadwal_kembali" name="has_jadwal_kembali">
                    Saya akan kembali ke luar negeri
                </label>
            </div>

            <!-- Jadwal Kembali (nullable) -->
            <div class="form-group" id="jadwal_kembali_container" style="display: none;">
                <label for="jadwal_kembali">Jadwal Kembali Keluar Negeri:</label>
                <input type="date" class="form-control" id="jadwal_kembali" name="jadwal_kembali">
            </div>

            <div class="form-group">
                <label for="no_hp">Nomer HP aktif:</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
            </div>

            <div class="form-group">
                <label for="pekerjaan">Pekerjaan:</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
            </div>

            <!-- Alasan Kepulangan -->
            <div class="form-group">
                <label for="alasan_kepulangan">Alasan Kepulangan:</label>
                <input type="text" class="form-control" id="alasan_kepulangan" name="alasan_kepulangan" required>
            </div>

            <!-- Alamat Kepulangan -->
            <div class="form-group">
                <label for="alamat_kepulangan">Alamat Kepulangan:</label>
                <textarea class="form-control" id="alamat_kepulangan" name="alamat_kepulangan" rows="3" required></textarea>
            </div>

            <br>
            <!-- Tombol Simpan -->
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan Data Kepulangan</button>
            </div>
        </form>
    </div>

    <script>
        // JavaScript untuk menampilkan atau menyembunyikan field jadwal kembali berdasarkan checkbox
        document.getElementById('has_jadwal_kembali').addEventListener('change', function() {
            const jadwalKembaliContainer = document.getElementById('jadwal_kembali_container');
            jadwalKembaliContainer.style.display = this.checked ? 'block' : 'none';
        });
    </script>
</body>
</html>

@endsection
