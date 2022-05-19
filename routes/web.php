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

Route::get('/', function () {
    return view('index');
});

//Route untuk Data Buku
Route::get('/buku', 'BukuController@bukutampil');

//Route untuk Data Siswa
Route::get('/siswa', 'SiswaController@bukutampil');

//Route untuk Data Petugas
Route::get('/petugas', 'PetugasController@bukutampil');

//Route untuk Data Peminjaman
Route::get('/peminjaman', 'PeminjamanController@bukutampil');

// Oleh karena itu selanjutnya kita buatkan route baru pada routes/web.php
Route::post('/buku/tambah','BukuController@bukutambah');

// Selanjutnya kita buatkan route baru pada routes/web.php
Route::get('/buku/hapus/{idbuku}','BukuController@bukuhapus');

// Oleh karena itu selanjutnya kita buatkan route baru pada routes/web.php
Route::put('/buku/edit/{idbuku}', 'BukuController@bukuedit');

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