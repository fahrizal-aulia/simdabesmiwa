
@extends('layouts.admin.main')

@section('container')
<div class="container-fluid px-4">
    <h2 class="mt-4">Dashboard Admin {{ auth()->user()->kota->nama_kota }}</h2>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h6>Jumlah Keberangkatan </h6>
                    <h5>{{ $hitung_keberangkatan }}</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/dashboard/keberangkatan">More Info</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h6>Jumlah Kepulangan </h6>
                    <h5>{{ $hitung_kepulangan }}</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/dashboard/kepulangan">More Info</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h6>Jumlah Pengguna Belum Disetujui </h6>
                    <h5>{{ $hitung_user }}</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/dashboard/pendaftar">More Info</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection