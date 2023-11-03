<?php

namespace App\Http\Controllers;

use App\Helpers\AlertFormatter;
use App\Models\Aset;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index()
    {
        $data['aset'] = Aset::all();
        $data['kategori'] = Kategori::all();
        $data['satuan'] = Satuan::all();
        return view('aset.index', $data);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'nama_aset'=> 'required',
            'id_kategori'=> 'required',
            'jumlah'=> 'required',
            'id_satuan'=> 'required',
            'harga'=> 'required',
            'tanggal_pengadaan'=> 'required',
            'lokasi' => 'required',
            'jumlah_rusak' => 'required',
        ]);

        $aset = Aset::create($data);
        if( $aset )
        {
            return redirect()->back()->with(AlertFormatter::success('Aset berhasil ditambahkan'));
        }
        return redirect()->back()->with(AlertFormatter::danger('Aset gagal ditambahkan'));
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'nama_aset'=> 'required',
            'id_kategori'=> 'required',
            'jumlah'=> 'required',
            'id_satuan'=> 'required',
            'harga'=> 'required',
            'tanggal_pengadaan'=> 'required',
            'lokasi' => 'required',
            'jumlah_rusak' => 'required',
        ]);

        $aset = Aset::findOrFail($id)->update($data);
        if( $aset > 0 )
        {
            return redirect()->back()->with(AlertFormatter::success('Aset berhasil diubah'));
        }
        return redirect()->back()->with(AlertFormatter::danger('Aset gagal diubah'));
    }

    public function delete(Request $request, int $id)
    {
        try{
            if(Aset::findOrFail($id)->delete() > 0)
            {
                return redirect()->back()->with(AlertFormatter::success('Berhasil menghapus aset.'));
            }
            return redirect()->back()->with(AlertFormatter::success('Gagal menghapus aset.'));
        }catch(\Exception $e)
        {
            return redirect()->back()->with(AlertFormatter::success('Gagal menghapus aset. ' . $e->getMessage()));
        }

    }

}
