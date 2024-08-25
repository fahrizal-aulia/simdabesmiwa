@extends('layouts.warga.main')

@section('container')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Dashboard</h3>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Status Pernikahan</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Tanggungan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> {{ $user->nik }}</td>
                        <td> {{ $user->nama }}</td>
                        <td>{{ $user->status_perkawinan }}</td>
                        <td>{{ $user->jenis_kelamin }}</td>
                        <td>{{ $user->pendidikan_terakhir }}</td>
                        <td>{{ $user->tanggungan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection