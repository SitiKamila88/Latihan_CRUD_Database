<?php
namespace App\Http\Controllers;
use App\Models\Pacar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PacarController extends Controller
{
public function index()
{
$pacar = Pacar::latest()->get();
return view('pacar.index', compact('pacar'));
}
public function create()
{
return view('pacar.create');
}
public function store(Request $request)
{
$validated = $request->validate([
'nama_pacar' => 'required|string|max:255',
'asal' => 'required|string',
'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
]);
if ($request->hasFile('foto')) {
$validated['foto'] = $request->file('foto')->store('menu', 'public');
}
Pacar::create($validated);
return redirect()->route('pacar.index')->with('success', 'pacar berhasil ditambahkan!');
}
public function edit(Pacar $pacar)
{
return view('pacar.edit', compact('pacar'));
}
public function update(Request $request, Pacar $pacar)
{
$validated = $request->validate([
'nama_pacar' => 'required|string|max:255',
'asal' => 'required|string',
'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
]);
if ($request->hasFile('foto')) {
if ($pacar->foto && Storage::disk('public')->exists($pacar->foto)) {
Storage::disk('public')->delete($pacar->foto);
}
$validated['foto'] = $request->file('foto')->store('pacar', 'public');
}
$pacar->update($validated);
return redirect()->route('pacar.index')->with('success', 'Pacar berhasil diperbarui!');
}
public function destroy(Pacar $pacar)
{
if ($pacar->foto && Storage::disk('public')->exists($pacar->foto)) {Storage::disk('public')->delete($pacar->foto);
}
$pacar->delete();
return redirect()->route('pacar.index')->with('success', 'Pacar berhasil dihapus!');
}
}