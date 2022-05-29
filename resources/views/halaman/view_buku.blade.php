@extends('index')
@section('title', 'Buku')

@section('isihalaman')
    <h3><center>Daftar Buku Perpustakaan</center></h3>
    <hr>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBukuTambah"> 
        Tambah Data Buku 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Buku</td>
                <td align="center">Kode Buku</td>
                <td align="center">Judul Buku</td>
                <td align="center">Pengarang</td>
                <td align="center">Penerbit</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($buku as $index=>$bk)
                <tr>
                    <td align="center" scope="row">{{ $index + $buku->firstItem() }}</td>
                    <td>{{$bk->idbuku}}</td>
                    <td>{{$bk->kodebuku}}</td>
                    <td>{{$bk->judul}}</td>
                    <td>{{$bk->pengarang}}</td>
                    <td>{{$bk->penerbit}}</td>
                    <td align="center">
                        
                        <!-- <button class="btn-warning">
                            Edit
                        </button> -->
                        <!-- Kita ubah button tersebut dengan menambahkan sintak untuk memanggil form edit dengan menggunakan Modal Bootstrap, kita ubah dan tambahkan sintak seperti berikut : -->

                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalBukuEdit{{$bk->idbuku}}">Edit
                        </button>
                        
                        |
                        <a href="buku/hapus/{{$bk->idbuku}}" onclick="return confirm('Apakah Anda yakin ingin menghapus buku?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $buku->currentPage() }} <br />
    Jumlah Data : {{ $buku->total() }} <br />
    Data Per Halaman : {{ $buku->perPage() }} <br />

    {{ $buku->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalBukuTambah" tabindex="-1" role="dialog" aria-labelledby="modalBukuTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBukuTambahLabel">Form Input Data Buku</h5>
                </div>
                <div class="modal-body">

                    <form name="formbukutambah" id="formbukutambah" action="/buku/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="idbuku" class="col-sm-4 col-form-label">Kode Buku</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kodebuku" name="kodebuku" placeholder="Masukkan Kode Buku">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Buku">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="pengarang" class="col-sm-4 col-form-label">Nama Pengarang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukkan Nama Pengarang">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="penerbit" class="col-sm-4 col-form-label">Penerbit</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Nama Penerbit">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="bukutambah" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->

    <!-- Awal Modal EDIT data Buku -->
    @foreach ($buku as $index=>$bk)
        
    
    <div class="modal fade" id="modalBukuEdit{{$bk->idbuku}}" tabindex="-1" role="dialog" aria-labelledby="modalBukuEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBukuEditLabel">Form Edit Data Buku</h5>
                </div>
                <div class="modal-body">
                    <form name="formbukuedit" id="formbukuedit" action="/buku/edit/{{ $bk->idbuku}} " method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="idbuku" class="col-sm-4 col-form-label">Kode Buku</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kodebuku" name="kodebuku" value="{{ $bk->kodebuku}}">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ $bk->judul}}">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="pengarang" class="col-sm-4 col-form-label">Nama Pengarang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $bk->pengarang}}">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="penerbit" class="col-sm-4 col-form-label">Penerbit</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $bk->penerbit}}">
                            </div>
                        </div>
                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="bukutambah" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<!-- Akhir Modal EDIT data buku -->
    
@endsection