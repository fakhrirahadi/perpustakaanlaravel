@extends('index')
@section('title', 'Siswa')

@section('isihalaman')
    <h3><center>Daftar Siswa</center></h3>
    <hr>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSiswaTambah"> 
        Tambah Data Siswa 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Siswa</td>
                <td align="center">NIS</td>
                <td align="center">Nama Siswa</td>
                <td align="center">Kelas</td>
                <td align="center">Hp</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($siswa as $index=>$sw)
                <tr>
                    <td align="center" scope="row">{{ $index + $siswa->firstItem() }}</td>
                    <td>{{$sw->idsiswa}}</td>
                    <td>{{$sw->nis}}</td>
                    <td>{{$sw->namasiswa}}</td>
                    <td>{{$sw->kelas}}</td>
                    <td>{{$sw->hp}}</td>
                    <td align="center">
                        
                        <!-- <button class="btn-warning">
                            Edit
                        </button> -->
                        <!-- Kita ubah button tersebut dengan menambahkan sintak untuk memanggil form edit dengan menggunakan Modal Bootstrap, kita ubah dan tambahkan sintak seperti berikut : -->

                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalSiswaEdit{{$sw->idsiswa}}">Edit
                        </button>
                        
                        <a href="siswa/hapus/{{$sw->idsiswa}}" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa?')">
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
    Halaman : {{ $siswa->currentPage() }} <br />
    Jumlah Data : {{ $siswa->total() }} <br />
    Data Per Halaman : {{ $siswa->perPage() }} <br />

    {{ $siswa->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Siswa -->
    <div class="modal fade" id="modalSiswaTambah" tabindex="-1" role="dialog" aria-labelledby="modalSiswaTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSiswaTambahLabel">Form Input Data Siswa</h5>
                </div>
                <div class="modal-body">

                    <form name="formsiswatambah" id="formsiswatambah" action="/siswa/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="idsiswa" class="col-sm-4 col-form-label">NIS</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS Siswa">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="namasiswa" class="col-sm-4 col-form-label">Nama Siswa</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="namasiswa" name="namasiswa" placeholder="Masukkan Nama Siswa">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-4 col-form-label">Hp</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukkan Nomor Hp">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="siswatambah" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR MODAL TAMBAH DATA SISWA -->

    <!-- AWAL MODAL EDIT DATA SISWA -->
    @foreach ($siswa as $index=>$sw)
        
    
    <div class="modal fade" id="modalSiswaEdit{{$sw->idsiswa}}" tabindex="-1" role="dialog" aria-labelledby="modalSiswaEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSiswaEditLabel">Form Edit Data Siswa</h5>
                </div>
                <div class="modal-body">
                    <form name="formsiswaedit" id="formsiswaedit" action="/siswa/edit/{{ $sw->idsiswa}} " method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="idsiswa" class="col-sm-4 col-form-label">NIS</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nis" name="nis" value="{{ $sw->nis}}">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="namasiswa" class="col-sm-4 col-form-label">Nama Siswa</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="namasiswa" name="namasiswa" value="{{ $sw->namasiswa}}">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $sw->kelas}}">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-4 col-form-label">Hp</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp" name="hp" value="{{ $sw->hp}}">
                            </div>
                        </div>
                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="siswatambah" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<!-- Akhir Modal EDIT data buku -->
    
@endsection