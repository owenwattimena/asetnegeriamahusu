<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Pengelolah;
use App\Models\Pengelolahan;
use Illuminate\Http\Request;

class BerandaControler extends Controller
{
    public function index()
    {
        $data['totalAset'] = Aset::count();
        $data['totalPengelolah'] = Pengelolah::count();
        $data['totalPengelolahan'] = Pengelolahan::count();
        return view('beranda.index', $data);
    }
}
