@extends('layouts.warga.main')

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

                <tr>
                    <th><strong>Tanggal Keberangkatan:</strong></th>
                    <td>{{ $pulang->tanggal_kepulangan->format('d M Y') }}</td> <!-- Format tanggal sesuai kebutuhan -->
                </tr>


                <tr>
                    <th><strong>Status Perkawinan:</strong></th>
                    <td>
                        {{ $pulang->status_perkawinan ? 'Menikah' : 'Belum Menikah' }}
                    </td>
                </tr>
                <tr>
                    <th><strong>Alasan Kepulangan:</strong></th>
                    <td>{{ $pulang->alasan_kepulangan }}</td>
                </tr>
                <tr>
                    <th><strong>Alamat Kepulangan:</strong></th>
                    <td>{{ $pulang->alamat_kepulangan }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="/dashboard/kepulangan/{{ $pulang->id }}/edit " class="btn btn-warning">Edit</a>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endsection
