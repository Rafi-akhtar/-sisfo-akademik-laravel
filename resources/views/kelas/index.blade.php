@extends('layouts.main')

@section('title', 'Data Kelas')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
        <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kelas</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kelas SISFO Akademik</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Tingkat</th>
                            <th>Jurusan</th>
                            <th>Tahun Ajaran</th>
                            <th>Jumlah Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelas as $index => $k)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $k->nama_kelas }}</td>
                            <td>
                                <span class="badge badge-info">{{ $k->tingkat }}</span>
                            </td>
                            <td>{{ $k->jurusan }}</td>
                            <td>{{ $k->tahun_ajaran }}</td>
                            <td>
                                <span class="badge badge-secondary"><i class="fas fa-users mr-1"></i> {{ $k->siswas_count ?? 0 }} Siswa</span>
                            </td>
                            <td>
                                <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i>
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
</div>
@endsection