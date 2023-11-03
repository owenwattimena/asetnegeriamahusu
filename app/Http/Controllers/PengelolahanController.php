<?php

namespace App\Http\Controllers;

use App\Helpers\AlertFormatter;
use App\Models\Aset;
use App\Models\Pengelolah;
use App\Models\Pengelolahan;
use Illuminate\Http\Request;

class PengelolahanController extends Controller
{
    public function index()
    {
        $data['aset'] = Aset::all();
        $data['pengelolah'] = Pengelolah::all();
        $data['pengelolahan'] = Pengelolahan::all();
        return view('pengelolahan.index', $data);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'id_aset' => 'required',
            'id_pengelolah' => 'required',
            'tanggal_mulai_kelolah' => 'required',
            'tanggal_selesai_kelolah' => 'required',
        ]);
        if(Pengelolahan::create($data))
        {
            return redirect()->back()->with(AlertFormatter::success('Berhasil menambahkan pengelolahan.'));
        }
        return redirect()->back()->with(AlertFormatter::success('Gagal menambahkan pengelolahan.'));
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'id_aset' => 'required',
            'id_pengelolah' => 'required',
            'tanggal_mulai_kelolah' => 'required',
            'tanggal_selesai_kelolah' => 'required',
        ]);
        if(Pengelolahan::findOrFail($id)->update($data))
        {
            return redirect()->back()->with(AlertFormatter::success('Berhasil mengubah pengelolahan.'));
        }
        return redirect()->back()->with(AlertFormatter::success('Gagal mengubah pengelolahan.'));
    }

    public function delete(Request $request, String $id)
    {
        try{
            if(Pengelolahan::where('id', $id)->delete() > 0)
            {
                return redirect()->back()->with(AlertFormatter::success('Berhasil menghapus pengelolahan.'));
            }
            return redirect()->back()->with(AlertFormatter::success('Gagal menghapus pengelolahan.'));
        }catch(\Exception $e)
        {
            return redirect()->back()->with(AlertFormatter::success('Gagal menghapus pengelolahan. ' . $e->getMessage()));
        }

    }
}
