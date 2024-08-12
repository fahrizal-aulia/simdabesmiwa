@extends('layouts.admin.main')

@section('container')

<div class="container-fluid px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Kepulangan</h1>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user me-1"></i> Informasi Kepulangan
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th><strong>NIK:</strong></th>
                    <td>{{ $pulang->user->nik }}</td>
                </tr>
                <tr>
                    <th><strong>Nama:</strong></th>
                    <td>{{ $pulang->user->nama }}</td>
                </tr>
                {{-- <tr>
                    <th><strong>Alamat:</strong></th>
                    <td>{{ $pulang->user->alamat_lengkap }}</td>
                </tr>
                <tr>
                    <th><strong>Nama:</strong></th>
                    <td>{{ $pulang->user->nomer_telfon }}</td>
                </tr> --}}
                {{-- <tr>
                    <th><strong>Tanggal Lahir:</strong></th>
                    <td> {{ \Carbon\Carbon::parse($pulang->tanggal_kepulangan)->format('d M Y') }}</td>
                </tr>
                <tr>
                    <th><strong>Pendapatan Perbulan:</strong></th>
                    <td>{{ number_format($pulang->biaya_keberangkatan, 2, ',', '.') }}</td>
                </tr> --}}
                <tr>
                    <th><strong>Nama Perusahaan:</strong></th>
                    <td>{{ $pulang->nama_perusahaan }}</td>
                </tr>
                <tr>
                    <th><strong>Negara Tujuan:</strong></th>
                    <td>{{ $pulang->negara_tujuan }}</td>
                </tr>
                <tr>
                    <th><strong>Tanggal Keberangkatan:</strong></th>
                    <td>{{ $pulang->tanggal_kepulangan->format('d M Y') }}</td> <!-- Format tanggal sesuai kebutuhan -->
                </tr>
                <tr>
                    <th><strong>Jenis Pekerjaan:</strong></th>
                    <td>{{ $pulang->jenis_pekerjaan }}</td>
                </tr>
                <tr>
                    <th><strong>Alamat di Luar Negeri:</strong></th>
                    <td>{{ $pulang->alamat_di_luar_negeri }}</td>
                </tr>
                <tr>
                    <th><strong>Status Perkawinan:</strong></th>
                    <td>
                        {{ $pulang->status_perkawinan ? 'Menikah' : 'Belum Menikah' }}
                    </td>
                </tr>
                <tr>
                    <th><strong>Biaya Pemberangkatan:</strong></th>
                    <td>{{ number_format($pulang->biaya_pemberangkatan, 0, ',', '.') }}</td> <!-- Format angka sesuai kebutuhan -->
                </tr>
                <tr>
                    <th><strong>Masa Kontrak (bulan):</strong></th>
                    <td>{{ $pulang->masa_kontrak }}</td>
                </tr>
                <tr>
                    <th><strong>Gaji Per Bulan:</strong></th>
                    <td>{{ number_format($pulang->gaji_perbulan, 0, ',', '.') }}</td> <!-- Format angka sesuai kebutuhan -->
                </tr>
                <tr>
                    <th><strong>Asuransi:</strong></th>
                    <td>{{ $pulang->asuransi }}</td>
                </tr>

                {{-- <tr>
                    <th><strong>Image:</strong></th>
                    <td>
                        @if ($pulang->image)
                            <img src="{{ asset('storage/' . $pulang->image) }}" alt="User Image" style="width: 150px; height: auto;">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                </tr> --}}
                {{-- <tr>
                    <th><strong>Status Approve:</strong></th>
                    <td>
                        <span class="badge bg-{{ $pulang->status_approve == 0 ? 'danger' : 'success' }}">
                            {{ $pulang->status_approve == 0 ? 'Belum Di Approve' : 'Disetujui' }}
                        </span>
                    </td>
                </tr> --}}
            </table>
        </div>
        <div class="card-footer">
            <a href="/dashboard/kepulangan/{{ $pulang->id }}/edit " class="btn btn-warning">Edit</a>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endsection
