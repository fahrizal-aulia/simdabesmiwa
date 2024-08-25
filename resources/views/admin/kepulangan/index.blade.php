@extends('layouts.admin.main')

@section('container')

<div class="container-fluid px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Dashboard Admin {{ auth()->user()->kota->nama_kota }}
        </h1>
    </div>
    <h1 class="mt-4">Daftar Kepulangan Warga</h1>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show col-lg-8" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Kepulangan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Alasan Kepulangan</th>
                        <th>Alamat Kepulangan</th>
                        <th>Tanggal Kepulangan</th>
                        {{-- <th>Status Perkawinan</th> --}}
                        {{-- <th>Status Approve</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kepulangan as $pulang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pulang->user->nik }}</td>
                        <td>{{ $pulang->user->nama }}</td>
                        <td>{{ $pulang->alasan_kepulangan }}</td>
                        <td>{{ $pulang->alamat_kepulangan }}</td>
                        <td>{{ \Carbon\Carbon::parse($pulang->tanggal_kepulangan)->format('d M Y') }}</td>
                        <td>
                            <a href="/dashboard/kepulangan/{{ $pulang->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                            <a href="/dashboard/kepulangan/{{ $pulang->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="/dashboard/kepulangan/{{ $pulang->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin Menghapus data ini?!!')">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
