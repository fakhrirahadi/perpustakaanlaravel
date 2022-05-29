<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model BukuModel
use App\Models\BukuModel;

class BukuController extends Controller
{
    //method untuk tampil data buku
    public function bukutampil()
    {
        $databuku = BukuModel::orderby('idbuku', 'ASC')
        ->paginate(5);

        return view('halaman/view_buku',['buku'=>$databuku]);
    }

    //method untuk tambah data buku
    public function bukutambah(Request $request)
    {
        $this->validate($request, [
            'kodebuku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required'
        ]);

        BukuModel::create([
            'kodebuku' => $request->kodebuku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit
        ]);

        return redirect('/buku');
    }

    //method untuk hapus data buku
    public function bukuhapus($idbuku)
    {
        $databuku=BukuModel::find($idbuku);
        $databuku->delete();

        return redirect()->back();
    }

    //method untuk edit data buku
    public function bukuedit($idbuku, Request $request)
    {
        $this->validate($request, [
            'kodebuku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required'
        ]);
        $idbuku = BukuModel::find($idbuku);
        $idbuku->kodebuku   = $request->kodebuku;
        $idbuku->judul      = $request->judul;
        $idbuku->pengarang  = $request->pengarang;
        $idbuku->penerbit   = $request->penerbit;
        $idbuku->save();
        return redirect()->back();
    }
}
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// // panggil model BukuModel
// use App\Models\BukuModel;

// class BukuController extends Controller
// {
//     //
//     public function bukutampil()
//     {
//         $databuku = BukuModel::orderby('kodebuku', 'ASC')
//         ->paginate(5);
//         return view('halaman/view_buku',['buku'=>$databuku]);
//     }
// }
