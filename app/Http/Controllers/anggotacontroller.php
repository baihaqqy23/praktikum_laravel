<?php
namespace App\Http\Controllers;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AnggotaController extends Controller
{
public function index()
{
$anggotas = Anggota::with('kartuAnggota')->get();
return view('anggota.index', compact('anggotas'));
}
public function create()
{
return view('anggota.create');
}
public function store(Request $request)
{
$request->validate([
'nama' => 'required|string|max:255',
'email' => 'required|email|unique:anggotas,email',
'nomor_kartu' => 'required|string|unique:kartu_anggotas,nomor_kartu',
'tanggal_aktivasi' => 'required|date'
]);
DB::transaction(function () use ($request) {
$anggota = Anggota::create([
'nama' => $request->nama,
'email' => $request->email,
]);
$anggota->kartuAnggota()->create([
'nomor_kartu' => $request->nomor_kartu,
'tanggal_aktivasi' => $request->tanggal_aktivasi,
]);
});
return redirect()->route('anggota.index')->with('success', 'Data Anggota & Kartu
berhasil disimpan!');
}
public function edit($id)
{
$anggota = Anggota::with('kartuAnggota')->findOrFail($id);
return view('anggota.edit', compact('anggota'));
}
public function update(Request $request, $id)
{
$anggota = Anggota::findOrFail($id);
$request->validate([
'nama' => 'required|string|max:255',
'email' => 'required|email|unique:anggotas,email,' . $anggota->id,
'nomor_kartu' => 'required|string|unique:kartu_anggotas,nomor_kartu,' . $anggota-
>kartuAnggota->id,
'tanggal_aktivasi' => 'required|date'
]);
DB::transaction(function () use ($request, $anggota) {
$anggota->update([
'nama' => $request->nama,
'email' => $request->email,
]);
$anggota->kartuAnggota->update([
'nomor_kartu' => $request->nomor_kartu,
'tanggal_aktivasi' => $request->tanggal_aktivasi,
]);
});
return redirect()->route('anggota.index')->with('success', 'Data Anggota & Kartu
berhasil diperbarui!');
}
public function destroy($id)
{
$anggota = Anggota::findOrFail($id);
$anggota->delete(); // Otomatis menghapus kartu karena cascade constraint
return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil
dihapus!');
}
};