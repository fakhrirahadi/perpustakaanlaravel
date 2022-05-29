<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model PetugasModel
use App\Models\PetugasModel;

class PetugasController extends Controller
{
    //method untuk tampil data petugas
    public function petugastampil()
    {
        $datapetugas = PetugasModel::orderby('idpetugas', 'ASC')
        ->paginate(5);

        return view('halaman/view_petugas',['petugas'=>$datapetugas]);
    }

    //method untuk tambah data petugas
    public function petugastambah(Request $request)
    {
        $this->validate($request, [
            'namapetugas' => 'required',
            'hp' => 'required'
        ]);

        PetugasModel::create([
            'namapetugas' => $request->namapetugas,
            'hp' => $request->hp,
        ]);

        return redirect('/petugas');
    }

    //method untuk hapus data petugas
    public function petugashapus($idpetugas)
    {
        $datapetugas=PetugasModel::find($idpetugas);
        $datapetugas->delete();

        return redirect()->back();
    }

    //method untuk edit data petugas
    public function petugasedit($idpetugas, Request $request)
    {
        $this->validate($request, [
            'namapetugas' => 'required',
            'hp' => 'required',
        ]);
        $idpetugas = PetugasModel::find($idpetugas);
        $idpetugas->idpetugas   = $request->idpetugas;
        $idpetugas->namapetugas      = $request->namapetugas;
        $idpetugas->hp  = $request->hp;
        $idpetugas->save();
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
