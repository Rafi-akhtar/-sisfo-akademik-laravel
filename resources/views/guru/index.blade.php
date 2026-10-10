@extends('layouts.main')

@section('title', 'Data Guru')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Guru</h1>
        <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Guru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Guru / Tenaga Pendidik</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gurus as $index => $guru)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $guru->nip }}</td>
                            <td>{{ $guru->nama }}</td>
                            <td>
                                <span class="badge {{ $guru->jenis_kelamin == 'L' ? 'badge-primary' : 'badge-danger' }}">
                                    {{ $guru->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                </span>
                            </td>
                            <td>{{ $guru->email }}</td>
                            <td>{{ $guru->no_hp }}</td>
                            <td>
                                <div class="d-flex" style="gap: 5px;">
                                    <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
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