<?php

namespace App\Http\Controllers;

use App\Helpers\AlertFormatter;
use App\Models\Pengelolah;
use Illuminate\Http\Request;

class PengelolahController extends Controller
{
    public function index()
    {
        $data['pengelolah'] = Pengelolah::all();
        return view("pengelolah.index", $data);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $kategori = Pengelolah::create($data);
        if( $kategori ){
            return redirect()->back()->with(AlertFormatter::success('Berhasil menambahkan pengelolah.'));
        }
        return redirect()->back()->with(AlertFormatter::success('Gagal menambahkan pengelolah.'));
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);
        $pengelolah = Pengelolah::where('id', $id)->update($data);

        if($pengelolah > 0)
        {
            return redirect()->back()->with(AlertFormatter::success('Berhasil mengubah pengelolah.'));
        }
        return redirect()->back()->with(AlertFormatter::success('Gagal mengubah pengelolah.'));
    }

    public function delete(Request $request, int $id)
    {
        try{
            if(Pengelolah::where('id', $id)->delete() > 0)
            {
                return redirect()->back()->with(AlertFormatter::success('Berhasil menghapus pengelolah.'));
            }
            return redirect()->back()->with(AlertFormatter::success('Gagal menghapus pengelolah.'));
        }catch(\Exception $e)
        {
            return redirect()->back()->with(AlertFormatter::success('Gagal menghapus pengelolah. ' . $e->getMessage()));
        }

    }
}
