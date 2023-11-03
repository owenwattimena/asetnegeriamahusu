<?php

namespace App\Http\Controllers;

use App\Helpers\AlertFormatter;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::orderBy('kategori')->get();
        return view('master.kategori.index', $data);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'kategori' => 'required'
        ]);

        $data['slug'] = Str::slug($data['kategori']);
        $kategori = Kategori::create($data);
        if( $kategori ){
            return redirect()->back()->with(AlertFormatter::success('Berhasil menambahkan kategori.'));
        }
        return redirect()->back()->with(AlertFormatter::success('Gagal menambahkan kategori.'));
    }

    public function update(Request $request, String $slug)
    {
        $data = $request->validate([
            'kategori' => 'required'
        ]);
        $data['slug'] = Str::slug($data['kategori']);
        $kategori = Kategori::where('slug', $slug)->update($data);

        if($kategori > 0)
        {
            return redirect()->back()->with(AlertFormatter::success('Berhasil mengubah kategori.'));
        }
        return redirect()->back()->with(AlertFormatter::success('Gagal mengubah kategori.'));
    }

    public function delete(Request $request, String $slug)
    {
        try{
            if(Kategori::where('slug', $slug)->delete() > 0)
            {
                return redirect()->back()->with(AlertFormatter::success('Berhasil menghapus kategori.'));
            }
            return redirect()->back()->with(AlertFormatter::success('Gagal menghapus kategori.'));
        }catch(\Exception $e)
        {
            return redirect()->back()->with(AlertFormatter::success('Gagal menghapus kategori. ' . $e->getMessage()));
        }

    }
}
