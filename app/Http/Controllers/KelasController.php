<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = \App\Models\Kelas::withCount('siswas')->get();
    return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view ('kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nama_kelas' => 'required',
        'tingkat' => 'required',
        'jurusan' => 'required',
        'tahun_ajaran' => 'required',
    ]);

    \App\Models\Kelas::create($request->all());
    return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kela)
    {
        return view('kelas.edit', compact('kela'));
    }

    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
        'nama_kelas' => 'required',
        'tingkat' => 'required',
        'jurusan' => 'required',
        'tahun_ajaran' => 'required',
    ]);

    $kela->update($request->all());
    return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kela)
    {
        $kela->delete();
    return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}

