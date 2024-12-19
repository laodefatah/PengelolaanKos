<?php

namespace App\Http\Controllers;
use illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Penghuni;

class PenghuniController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query data penghuni dengan filter pencarian
        $penghuni = Penghuni::when($search, function ($query, $search) {
        return $query->where('nama', 'like', "%{$search}%")
                     ->orWhere('no_whatsapp', 'like', "%{$search}%");
        })->paginate(10);

        return view('penghuni_index', compact('penghuni'));
    }

    public function create()
    {
        return view('penghuni_create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_whatsapp' => 'required|regex:/^\\+?\\d{10,15}$/',
            'tanggal_masuk' => 'required|date',
        ]);
    
        Penghuni::create($requestData);
    
        return redirect('/penghuni')->with('success', 'Data penghuni berhasil disimpan.');
    }

    public function edit(string $id)
    {
        $data['penghuni'] = Penghuni::findOrFail($id);
        return view('penghuni_edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_whatsapp' => 'required|regex:/^\\+?\\d{10,15}$/',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        $penghuni = Penghuni::findOrFail($id);
        $penghuni->update($requestData);

        return redirect('/penghuni')->with('success', 'Data penghuni berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $penghuni->delete();

        return redirect('/penghuni')->with('success', 'Data penghuni berhasil dihapus.');
    }
}
