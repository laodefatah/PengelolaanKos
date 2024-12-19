<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;


class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kamar'] = Kamar::latest()->paginate(10);
        return view('kamar_index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kamar_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'no_kamar' => 'required|string|max:10|unique:kamars,no_kamar',
            'tipe_kamar' => 'required|regex:/^[A-Z]$/',
            'harga_per_bulan' => 'required|integer|min:0',
            'status' => 'nullable|in:tersedia,terisi',
        ]);

        // Simpan ke database
        Kamar::create($requestData);

        return redirect('/kamar')->with('success', 'Data Kamar berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['kamar'] = Kamar::findOrFail($id);
        return view('kamar_edit', $data);    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'no_kamar' => 'required|string|max:255',
            'harga_per_bulan' => 'required|integer|min:0',
            'tipe_kamar' => 'required|regex:/^[A-Z]$/',
            'status' => 'required|in:tersedia,terisi',
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->update($requestData);

        return redirect('/kamar')->with('success', 'Data Kamar berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect('/kamar')->with('success', 'Data Kamar berhasil dihapus.');
    }
}