<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = \App\Models\Siswa::with('kelas')->get();
    return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelas = \App\Models\Kelas::all();
    return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'nis' => 'required|unique:siswas,nis',
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'kelas_id' => 'required',
    ]);

    \App\Models\Siswa::create($request->all());
    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(Siswa $siswa)
    {
        $siswa->load(['kelas', 'nilais.mapel']);
        return view('siswa.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        $kelas = \App\Models\Kelas::all();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
        'nis' => 'required|unique:siswas,nis,' . $siswa->id,
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'kelas_id' => 'required',
    ]);

    $siswa->update($request->all());
    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}

