@extends('layouts.warga.main')

@section('container')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Datatable</h3>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-10 mt-3 ml-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show col-lg-10 mt-3 ml-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Simple Datatable</span>
            <a href="/keberangkatan/create" class="btn btn-primary">
                <span data-feather="plus"></span> Tambah Keberangkatan
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Negara tujuan</th>
                        <th>Tanggal Keberangkatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keberangkatan as $berangkat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $berangkat->user->nik }}</td>
                        <td>{{ $berangkat->user->nama }}</td>
                        <td>{{ $berangkat->negara_tujuan }}</td>
                        <td>{{ \Carbon\Carbon::parse($berangkat->tanggal_keberangkatan)->format('d M Y') }}</td>
                        <td>
                            <a href="/keberangkatan/{{ $berangkat->id }}" class="badge bg-info">
                                <span data-feather="eye"></span>
                            </a>
                            <a href="/keberangkatan/{{ $berangkat->id }}/edit" class="badge bg-warning">
                                <span data-feather="edit"></span>
                            </a>
                            <form action="/keberangkatan/{{ $berangkat->id }}" method="POST" class="d-inline">
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
</section>

@endsection
