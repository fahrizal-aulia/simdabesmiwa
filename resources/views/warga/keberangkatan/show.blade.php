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
    <div class="row" id="table-striped">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Keberangkatan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p class="card-text">Menampilkan detail informasi keberangkatan berdasarkan data yang tersedia.</p>
                    </div>
                    <!-- table detail -->
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th><strong>NIK:</strong></th>
                                <td>{{ $berangkat->user->nik }}</td>
                            </tr>
                            <tr>
                                <th><strong>Nama:</strong></th>
                                <td>{{ $berangkat->user->nama }}</td>
                            </tr>
                            {{-- <tr>
                                <th><strong>Alamat:</strong></th>
                                <td>{{ $berangkat->user->alamat_lengkap }}</td>
                            </tr>
                            <tr>
                                <th><strong>Nama:</strong></th>
                                <td>{{ $berangkat->user->nomer_telfon }}</td>
                            </tr> --}}
                            {{-- <tr>
                                <th><strong>Tanggal Lahir:</strong></th>
                                <td> {{ \Carbon\Carbon::parse($berangkat->tanggal_keberangkatan)->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <th><strong>Pendapatan Perbulan:</strong></th>
                                <td>{{ number_format($berangkat->biaya_keberangkatan, 2, ',', '.') }}</td>
                            </tr> --}}
                            <tr>
                                <th><strong>Nama Perusahaan:</strong></th>
                                <td>{{ $berangkat->nama_perusahaan }}</td>
                            </tr>
                            <tr>
                                <th><strong>Negara Tujuan:</strong></th>
                                <td>{{ $berangkat->negara_tujuan }}</td>
                            </tr>
                            <tr>
                                <th><strong>Tanggal Keberangkatan:</strong></th>
                                <td>{{ $berangkat->tanggal_keberangkatan->format('d M Y') }}</td> <!-- Format tanggal sesuai kebutuhan -->
                            </tr>
                            <tr>
                                <th><strong>Jenis Pekerjaan:</strong></th>
                                <td>{{ $berangkat->jenis_pekerjaan }}</td>
                            </tr>
                            <tr>
                                <th><strong>Alamat di Luar Negeri:</strong></th>
                                <td>{{ $berangkat->alamat_di_luar_negeri }}</td>
                            </tr>
                            <tr>
                                <th><strong>Status Perkawinan:</strong></th>
                                <td>
                                    {{ $berangkat->status_perkawinan ? 'Menikah' : 'Belum Menikah' }}
                                </td>
                            </tr>
                            <tr>
                                <th><strong>Biaya Pemberangkatan:</strong></th>
                                <td>{{ number_format($berangkat->biaya_pemberangkatan, 0, ',', '.') }}</td> <!-- Format angka sesuai kebutuhan -->
                            </tr>
                            <tr>
                                <th><strong>Masa Kontrak (bulan):</strong></th>
                                <td>{{ $berangkat->masa_kontrak }}</td>
                            </tr>
                            <tr>
                                <th><strong>Gaji Per Bulan:</strong></th>
                                <td>{{ number_format($berangkat->gaji_perbulan, 0, ',', '.') }}</td> <!-- Format angka sesuai kebutuhan -->
                            </tr>
                            <tr>
                                <th><strong>Asuransi:</strong></th>
                                <td>{{ $berangkat->asuransi }}</td>
                            </tr>

                            {{-- <tr>
                                <th><strong>Image:</strong></th>
                                <td>
                                    @if ($berangkat->image)
                                        <img src="{{ asset('storage/' . $berangkat->image) }}" alt="User Image" style="width: 150px; height: auto;">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                            </tr> --}}
                            {{-- <tr>
                                <th><strong>Status Approve:</strong></th>
                                <td>
                                    <span class="badge bg-{{ $berangkat->status_approve == 0 ? 'danger' : 'success' }}">
                                        {{ $berangkat->status_approve == 0 ? 'Belum Di Approve' : 'Disetujui' }}
                                    </span>
                                </td>
                            </tr> --}}
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="/keberangkatan/{{ $berangkat->id }}/edit " class="btn btn-warning">edit</a>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection