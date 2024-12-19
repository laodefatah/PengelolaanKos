<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class LandingPageController extends Controller
{
    public function index()
    {
        // Mengambil data kamar yang kosong (status: tersedia)
        $data['kamar'] = Kamar::where('status', 'tersedia')->latest()->get();

        // Mengirim data ke view
        return view('landing_page', $data);
    }
}
