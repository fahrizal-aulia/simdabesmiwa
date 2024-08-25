@extends('layouts.admin.main')

@section('container')

<div class="container-fluid px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Warga</h1>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user me-1"></i> Informasi Warga
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th><strong>NIK:</strong></th>
                    <td>{{ $user->nik }}</td>
                </tr>
                <tr>
                    <th><strong>Nama Lengkap:</strong></th>
                    <td>{{ $user->nama }}</td>
                </tr>
                <tr>
                    <th><strong>Alamat Lengkap:</strong></th>
                    <td>
                        {{ $user->alamat_lengkap }}
                        {{-- Jika ingin menambahkan detail alamat, uncomment bagian berikut --}}
                        {{-- RT: {{ $user->rt }}, RW: {{ $user->rw }}, Desa: {{ $user->desa }} --}}
                    </td>
                </tr>
                <tr>
                    <th><strong>Kota/Kabupaten:</strong></th>
                    <td>{{ $user->kota->nama_kota }}</td>
                </tr>
                <tr>
                    <th><strong>Kecamatan:</strong></th>
                    <td>{{ $user->kecamatan->nama_kecamatan }}</td>
                </tr>
                <tr>
                    <th><strong>Nomor HP/WA Aktif:</strong></th>
                    <td>{{ $user->nomer_telfon }}</td>
                </tr>
                <tr>
                    <th><strong>Tempat Lahir:</strong></th>
                    <td>{{ $user->kota_kelahiran }}</td>
                </tr>
                <tr>
                    <th><strong>Tanggal Lahir:</strong></th>
                    <td>{{ $user->tanggal_lahir->format('d M Y') }}</td>
                </tr>
                <tr>
                    <th><strong>Pekerjaan:</strong></th>
                    <td>{{ $user->pekerjaan }}</td>
                </tr>
                <tr>
                    <th><strong>Status Perkawinan:</strong></th>
                    <td>
                        {{ $user->status_perkawinan ? 'Menikah' : 'Belum Menikah' }}
                    </td>
                </tr>
                <tr>
                    <th><strong>Pendapatan Perbulan:</strong></th>
                    <td>{{ number_format($user->pendapatan_perbulan, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th><strong>Pendidikan Terakhir:</strong></th>
                    <td>{{ $user->pendidikan_terakhir }}</td>
                </tr>
                <tr>
                    <th><strong>Tanggungan Anak/Keluarga:</strong></th>
                    <td>{{ $user->tanggungan }}</td>
                </tr>
                <tr>
                    <th><strong>Gambar Foto:</strong></th>
                    <td>
                        @if ($user->image)
                            <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" class="img-fluid" style="max-width: 150px;">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                </tr>
                <tr>
                    <th><strong>Status Approve:</strong></th>
                    <td>
                        <span class="badge bg-{{ $user->status_approve == 1 ? 'success' : 'danger' }}">
                            {{ $user->status_approve == 1 ? 'Disetujui' : 'Belum Di Approve' }}
                        </span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endsection
