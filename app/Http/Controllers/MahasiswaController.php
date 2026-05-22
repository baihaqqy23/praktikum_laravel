<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    // Menampilkan semua data mahasiswa
    public function index()
    {
        $data = Mahasiswa::all();
        return view('mahasiswa.index', compact('data'));
    }

    // Menampilkan form tambah mahasiswa
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Menyimpan data mahasiswa baru
    public function store(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect('/mahasiswa');
    }

    // Menampilkan form edit mahasiswa
    public function edit($id)
    {
        $m = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('m'));
    }

    // Mengupdate data mahasiswa
    public function update(Request $request, $id)
    {
        Mahasiswa::find($id)->update($request->all());
        return redirect('/mahasiswa');
    }

    // Menghapus data mahasiswa
    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa');
    }
}