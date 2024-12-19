<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Penghuni;
use App\Models\Kamar;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi'] = Transaksi::latest()->paginate(10);
        return view('transaksi_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['kamars'] = Kamar::all();
        $data['penghunis'] = Penghuni::all();
        return view('transaksi_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'kamar_id' => 'required|exists:kamars,id',
            'penghuni_id' => 'required|exists:penghunis,id',
            'jumlah_pembayaran' => 'required|numeric|min:0',
            'tanggal_transaksi' => 'required|date',
            'status_pembayaran' => 'required|in:Lunas,Belum Lunas',
        ]);

        Transaksi::create($requestData);

        return redirect('/transaksi')->with('success', 'Transaksi berhasil ditambahkan.');
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
        $data['transaksi'] = Transaksi::findOrFail($id);
        $data['kamars'] = Kamar::all();
        $data['penghunis'] = Penghuni::all();
        return view('transaksi_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'kamar_id' => 'required|exists:kamars,id',
            'penghuni_id' => 'required|exists:penghunis,id',
            'jumlah_pembayaran' => 'required|numeric|min:0',
            'tanggal_transaksi' => 'required|date',
            'status_pembayaran' => 'required|in:Lunas,Belum Lunas',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($requestData);

        return redirect('/transaksi')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect('/transaksi')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function laporan(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $transaksi = Transaksi::with('penghuni', 'kamar')
            ->whereBetween('tanggal_transaksi', [$startDate, $endDate])
            ->get();

        $totalPemasukan = $transaksi->sum('jumlah_pembayaran');

        return view('transaksi_laporan', compact('transaksi', 'totalPemasukan', 'startDate', 'endDate'));
    }

    public function pengingat()
    {
        $penghuniBelumLunas = Penghuni::whereDoesntHave('transaksi', function ($query) {
            $query->where('status_pembayaran', 'lunas');
        })->get();

        return view('transaksi_pengingat', compact('penghuniBelumLunas'));
    }
}
