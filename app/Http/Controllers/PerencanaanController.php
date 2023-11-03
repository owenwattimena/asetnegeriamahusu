<?php

namespace App\Http\Controllers;

use App\Helpers\AlertFormatter;
use App\Models\Perencanaan;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Http\Request;

class PerencanaanController extends Controller
{
    public function index()
    {
        $data['perencanaan'] = Perencanaan::all();
        $data['kategori'] = Kategori::all();
        $data['satuan'] = Satuan::all();
        return view('perencanaan.index', $data);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'nama_aset'=> 'required',
            'id_kategori'=> 'required',
            'jumlah'=> 'required',
            'id_satuan'=> 'required',
            'harga'=> 'required',
        ]);

        $perencanaan = Perencanaan::create($data);
        if( $perencanaan )
        {
            return redirect()->back()->with(AlertFormatter::success('Perencanaan Aset berhasil ditambahkan'));
        }
        return redirect()->back()->with(AlertFormatter::danger('Perencanaan Aset gagal ditambahkan'));
    }
    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'nama_aset'=> 'required',
            'id_kategori'=> 'required',
            'jumlah'=> 'required',
            'id_satuan'=> 'required',
            'harga'=> 'required',
        ]);

        $perencanaan = Perencanaan::findOrFail($id)->update($data);
        if( $perencanaan > 0 )
        {
            return redirect()->back()->with(AlertFormatter::success('Perencanaan Aset berhasil diubah'));
        }
        return redirect()->back()->with(AlertFormatter::danger('Perencanaan Aset gagal diubah'));
    }

    public function delete(Request $request, int $id)
    {
        try{
            if(Perencanaan::findOrFail($id)->delete() > 0)
            {
                return redirect()->back()->with(AlertFormatter::success('Berhasil menghapus perencanaan aset.'));
            }
            return redirect()->back()->with(AlertFormatter::success('Gagal menghapus perencanaan aset.'));
        }catch(\Exception $e)
        {
            return redirect()->back()->with(AlertFormatter::success('Gagal menghapus perencanaan aset. ' . $e->getMessage()));
        }

    }
}
