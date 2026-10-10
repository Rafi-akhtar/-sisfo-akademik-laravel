@extends('layouts.main')

@section('title', 'Detail Siswa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Detail Profil Siswa</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="200">NIS</th>
                    <td>: {{ $siswa->nis }}</td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>: {{ $siswa->nama }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>: {{ $siswa->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>: {{ $siswa->kelas->nama_kelas ?? '-' }} ({{ $siswa->kelas->jurusan ?? '-' }})</td>
                </tr>
                <tr>
                    <th>No HP</th>
                    <td>: {{ $siswa->no_hp }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>: {{ $siswa->alamat }}</td>
                </tr>
            </table>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection