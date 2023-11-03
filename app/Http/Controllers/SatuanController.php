<?php

namespace App\Http\Controllers;

use App\Helpers\AlertFormatter;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SatuanController extends Controller
{
    public function index()
    {
        $data['satuan'] = Satuan::orderBy('satuan')->get();
        return view('master.satuan.index', $data);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'satuan' => 'required'
        ]);

        $data['slug'] = Str::slug($data['satuan']);
        $satuan = Satuan::create($data);
        if( $satuan ){
            return redirect()->back()->with(AlertFormatter::success('Berhasil menambahkan satuan.'));
        }
        return redirect()->back()->with(AlertFormatter::success('Gagal menambahkan satuan.'));
    }

    public function update(Request $request, String $slug)
    {
        $data = $request->validate([
            'satuan' => 'required'
        ]);
        $data['slug'] = Str::slug($data['satuan']);
        $satuan = Satuan::where('slug', $slug)->update($data);

        if($satuan > 0)
        {
            return redirect()->back()->with(AlertFormatter::success('Berhasil mengubah satuan.'));
        }
        return redirect()->back()->with(AlertFormatter::success('Gagal mengubah satuan.'));
    }

    public function delete(Request $request, String $slug)
    {
        try{
            if(Satuan::where('slug', $slug)->delete() > 0)
            {
                return redirect()->back()->with(AlertFormatter::success('Berhasil menghapus satuan.'));
            }
            return redirect()->back()->with(AlertFormatter::success('Gagal menghapus satuan.'));
        }catch(\Exception $e)
        {
            return redirect()->back()->with(AlertFormatter::success('Gagal menghapus satuan. ' . $e->getMessage()));
        }

    }
}
