<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model SiswaModel
use App\Models\SiswaModel;

class SiswaController extends Controller
{
    //method untuk tampil data siswa
    public function siswatampil()
    {
        $datasiswa = SiswaModel::orderby('nis', 'ASC')
        ->paginate(5);

        return view('halaman/view_siswa',['siswa'=>$datasiswa]);
    }

    //method untuk tambah data siswa
    public function siswatambah(Request $request)
    {
        $this->validate($request, [
            'nis' => 'required',
            'namasiswa' => 'required',
            'kelas' => 'required',
            'hp' => 'required'
        ]);

        SiswaModel::create([
            'nis' => $request->nis,
            'namasiswa' => $request->namasiswa,
            'kelas' => $request->kelas,
            'hp' => $request->hp
        ]);

        return redirect('/siswa');
    }

    //method untuk hapus data siswa
    public function siswahapus($nis)
    {
        $datasiswa=SiswaModel::find($nis);
        $datasiswa->delete();

        return redirect()->back();
    }

    //method untuk edit data siswa
    public function siswaedit($idsiswa, Request $request)
    {
        $this->validate($request, [
            'nis' => 'required',
            'namasiswa' => 'required',
            'kelas' => 'required',
            'hp' => 'required'
        ]);
        $idsiswa = SiswaModel::find($idsiswa);
        $idsiswa->nis   = $request->nis;
        $idsiswa->namasiswa      = $request->namasiswa;
        $idsiswa->kelas  = $request->kelas;
        $idsiswa->hp   = $request->hp;
        $idsiswa->save();
        return redirect()->back();
    }
}