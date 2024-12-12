<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index(){
        $data['penghuni'] = \App\Models\Penghuni::latest()->paginate(10);
        return view('penghuni_index', $data);
    }

    public function create(){
        //
    }
}
