@extends('index')
@section('title', 'Petugas')

@section('isihalaman')
    <h3><center>Daftar Petugas</center></h3>
    <hr>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPetugasTambah"> 
        Tambah Data Petugas 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Petugas</td>
                <td align="center">Nama Petugas</td>
                <td align="center">No Hp</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($petugas as $index=>$pt)
                <tr>
                    <td align="center" scope="row">{{ $index + $petugas->firstItem() }}</td>
                    <td>{{$pt->idpetugas}}</td>
                    <td>{{$pt->namapetugas}}</td>
                    <td>{{$pt->hp}}</td>
                    <td align="center">
                        
                        <!-- <button class="btn-warning">
                            Edit
                        </button> -->
                        <!-- Kita ubah button tersebut dengan menambahkan sintak untuk memanggil form edit dengan menggunakan Modal Bootstrap, kita ubah dan tambahkan sintak seperti berikut : -->

                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalPetugasEdit{{$pt->idpetugas}}">Edit
                        </button>
                        
                        |
                        <a href="petugas/hapus/{{$pt->idpetugas}}" onclick="return confirm('Apakah Anda yakin ingin menghapus petugas?')">
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
    Halaman : {{ $petugas->currentPage() }} <br />
    Jumlah Data : {{ $petugas->total() }} <br />
    Data Per Halaman : {{ $petugas->perPage() }} <br />

    {{ $petugas->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Petugas -->
    <div class="modal fade" id="modalPetugasTambah" tabindex="-1" role="dialog" aria-labelledby="modalPetugasTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPetugasTambahLabel">Form Input Data Petugas</h5>
                </div>
                <div class="modal-body">

                    <form name="formpetugastambah" id="formpetugastambah" action="/petugas/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="idpetugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="namapetugas" name="namapetugas" placeholder="Masukkan Nama Petugas">
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
                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="petugastambah" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data petugas -->

    <!-- Awal Modal EDIT data Petugas -->
    @foreach ($petugas as $index=>$pt)
        
    
    <div class="modal fade" id="modalPetugasEdit{{$pt->idpetugas}}" tabindex="-1" role="dialog" aria-labelledby="modalPetugasEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPetugasEditLabel">Form Edit Data Petugas</h5>
                </div>
                <div class="modal-body">
                    <form name="formpetugasedit" id="formpetugasedit" action="/petugas/edit/{{ $pt->idpetugas}} " method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="idpetugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="namapetugas" name="namapetugas" value="{{ $pt->namapetugas}}">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-4 col-form-label">No Hp</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp" name="hp" value="{{ $pt->hp}}">
                            </div>
                        </div>
                        <p>
                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="petugastambah" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<!-- Akhir Modal EDIT data petugas -->
    
@endsection