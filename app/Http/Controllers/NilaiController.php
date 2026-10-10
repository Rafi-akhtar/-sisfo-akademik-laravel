<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = \App\Models\Nilai::with(['siswa.kelas', 'mapel'])->get();
    return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        $siswas = \App\Models\Siswa::all();
    $mapels = \App\Models\Mapel::all();
    return view('nilai.create', compact('siswas', 'mapels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'mapel_id' => 'required',
            'nilai_tugas' => 'required|numeric',
            'nilai_uts' => 'required|numeric',
            'nilai_uas' => 'required|numeric',
        ]);
        
        $nilaiAkhir = ($request->nilai_tugas * 0.3) + ($request->nilai_uts * 0.3) + ($request->nilai_uas * 0.4);
        
        $mapel = \App\Models\Mapel::findOrFail($request->mapel_id);
        
        $keterangan = $nilaiAkhir >= $mapel->kkm ? 'Lulus' : 'Tidak lulus';
        
        \App\Models\Nilai::create([
        'siswa_id' => $request->siswa_id,
        'mapel_id' => $request->mapel_id,
        'nilai_tugas' => $request->nilai_tugas,
        'nilai_uts' => $request->nilai_uts,
        'nilai_uas' => $request->nilai_uas,
        'nilai_akhir' => $nilaiAkhir,
        'keterangan' => $keterangan,
    ]);

    return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil ditambahkan.');
    }

    public function edit(Nilai $nilai)
    {
        $siswas = \App\Models\Siswa::all();
        $mapels = \App\Models\Mapel::all();
        return view('nilai.edit', compact('nilai', 'siswas', 'mapels'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
        'siswa_id' => 'required',
        'mapel_id' => 'required',
        'nilai_tugas' => 'required|numeric',
        'nilai_uts' => 'required|numeric',
        'nilai_uas' => 'required|numeric',
    ]);

    $nilaiAkhir = ($request->nilai_tugas * 0.3) + ($request->nilai_uts * 0.3) + ($request->nilai_uas * 0.4);
    $mapel = \App\Models\Mapel::findOrFail($request->mapel_id);
    $keterangan = $nilaiAkhir >= $mapel->kkm ? 'Lulus' : 'Tidak lulus';

    $nilai->update([
        'siswa_id' => $request->siswa_id,
        'mapel_id' => $request->mapel_id,
        'nilai_tugas' => $request->nilai_tugas,
        'nilai_uts' => $request->nilai_uts,
        'nilai_uas' => $request->nilai_uas,
        'nilai_akhir' => $nilaiAkhir,
        'keterangan' => $keterangan,
    ]);

    return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
    return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil dihapus.');
    }
}

