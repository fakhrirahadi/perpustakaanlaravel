<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route / dan route home
Route::get('/', function () {
    return view('halaman/view_home');
});

// // Route Home
// Route::get('/home', function(){
//     return view('home');
// });

//Route untuk Data Buku
Route::get('/buku', 'BukuController@bukutampil');

//Route untuk Data Siswa
Route::get('/siswa', 'SiswaController@siswatampil');

//Route untuk Data Petugas
Route::get('/petugas', 'PetugasController@petugastampil');

// Route Petugas Tambah
Route::post('/petugas/tambah', 'PetugasController@petugastambah');

// Route Petugas Edit
Route::put('/petugas/edit/{idpetugas}', 'PetugasController@petugasedit');

// Route Petugas Hapus DELETE
Route::get('/petugas/hapus/{idpetugas}', 'PetugasController@petugashapus');

//Route untuk Data Peminjaman
Route::get('/peminjaman', 'PeminjamanController@bukutampil');

// Oleh karena itu selanjutnya kita buatkan route baru pada routes/web.php
Route::post('/buku/tambah','BukuController@bukutambah');
Route::post('/petugas/tambah','PetugasController@petugastambah');
Route::post('/siswa/tambah','SiswaController@siswatambah');

// SISWA TAMBAH
Route::post('/siswa/tambah','SiswaController@siswatambah');

// SISWA HAPUS
Route::get('/siswa/hapus/{idsiswa}','SiswaController@siswahapus');

// Selanjutnya kita buatkan route baru pada routes/web.php
Route::get('/buku/hapus/{idbuku}','BukuController@bukuhapus');
Route::get('/petugas/hapus/{idpetugas}','PetugasController@petugashapus');

// Oleh karena itu selanjutnya kita buatkan route baru pada routes/web.php
Route::put('/buku/edit/{idbuku}', 'BukuController@bukuedit');
Route::put('/petugas/edit/{idpetugas}', 'PetugasController@petugasedit');
Route::post('/siswa/tambah','SiswaController@siswatambah');

// Selanjutnya kita buatkan route baru pada routes/web.php
Route::get('/buku/hapus/{idbuku}','BukuController@bukuhapus');
Route::post('/siswa/hapus/{idsiswa}','SiswaController@siswatambah');

// Oleh karena itu selanjutnya kita buatkan route baru pada routes/web.php
Route::put('/buku/edit/{idbuku}', 'BukuController@bukuedit');
Route::post('/siswa/edit/{idsiswa}','SiswaController@siswatambah');

// Pada sintak tersebut terdapat link yang mengarahkan ke alamat /pinjam, maka selanjutnya kita buat route baru pada file routes/web.php dengan sintak seperti berikut
Route::get('/pinjam', 'PinjamController@pinjamtampil');

// Pada modal tambah terdapat sintak :
// <form name="formpinjamtambah" id="formpinjamtambah" action="/pinjam/tambah" method="post" enctype="multipart/form-data">
// form tersebut mengarahkan action ke alamat /pinjam/tambah, maka selanjutnya kita buat route baru pada routes/web.php dengan sintak seperti berikut ini :
Route::post('/pinjam/tambah','PinjamController@pinjamtambah');

// Pada view_pinjam.blade.php terdapat button Delete
// <a href="pinjam/hapus/{{$p->idpinjam}}" onclick="return confirm('Yakin mau dihapus?')">
// <button class="btn-danger">
// Delete
// </button>
// </a>
// Selanjutnya kita buatkan route baru pada routes/web.php
Route::get('/pinjam/hapus/{idpinjam}','PinjamController@pinjamhapus');

// Dalam modalPinjamEdit tersebut terdapat form dengan action yang diarahkan ke alamat /pinjam/edit/{{ $p->idpinjam}},
// <form name="formpinjamedit" id="formpinjamedit" action="/pinjam/edit/{{ $p->idpinjam}} " method="post" enctype="multipart/form-data">
// Oleh karena itu selanjutnya kita buatkan route baru pada routes/web.php
Route::put('/pinjam/edit/{idpinjam}', 'PinjamController@pinjamedit');