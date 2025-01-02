<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Penghuni;

class LandingPageController extends Controller
{
    public function index()
    {
        // Mengambil data kamar yang kosong (status: tersedia)
        $data['kamars'] = Kamar::where('status', 'tersedia')->latest()->get();
        $data['penghunis'] = Penghuni::all();

        // Mengirim data ke view
        return view('landing_page', $data);
    }
}
