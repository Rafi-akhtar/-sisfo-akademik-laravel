@extends('layouts.main')

@section('title', 'Nilai Siswa')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-star mr-2 text-primary"></i>Nilai Akademik Siswa</h1>
        <a href="{{ route('nilai.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Input Nilai Siswa
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Nilai Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">Siswa</th>
                            <th style="width: 8%;">Kelas</th>
                            <th style="width: 22%;">Mata Pelajaran</th>
                            <th style="width: 10%; white-space: nowrap;">Nilai Tugas <br>(30%)</th>
                            <th style="width: 10%; white-space: nowrap;">Nilai UTS <br>(30%)</th>
                            <th style="width: 10%; white-space: nowrap;">Nilai UAS <br>(40%)</th>
                            <th style="width: 8%; white-space: nowrap;">Nilai Akhir</th>
                            <th style="width: 7%;">Status</th>
                            <th style="width: 5%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nilais as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="font-weight-bold">{{ $item->siswa->nama ?? '-' }}</td>
                                <td><span class="badge badge-secondary">{{ $item->siswa->kelas->nama_kelas ?? '-' }}</span>
                                </td>
                                <td>{{ $item->mapel->nama_mapel ?? '-' }}</td>
                                <td class="text-center">{{ $item->nilai_tugas }}</td>
                                <td class="text-center">{{ $item->nilai_uts }}</td>
                                <td class="text-center">{{ $item->nilai_uas }}</td>
                                <td class="text-center"><span
                                        class="badge badge-info p-2 h6 mb-0">{{ $item->nilai_akhir }}</span></td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $item->keterangan == 'Lulus' ? 'success' : 'danger' }} p-2">
                                        <i
                                            class="fas fa-{{ $item->keterangan == 'Lulus' ? 'check-circle' : 'times-circle' }} mr-1"></i>
                                        {{ $item->keterangan }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center" style="gap: 5px;">
                                        <a href="{{ route('nilai.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('nilai.destroy', $item->id) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus nilai ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center py-4 text-muted">Belum ada data nilai siswa yang
                                    ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection