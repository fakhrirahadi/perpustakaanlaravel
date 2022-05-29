@extends('index')
@section('title', 'Pinjam')

@section('isihalaman')
    <h3><center>Data Peminjaman Buku</center><h3>
    <h3><center>Perpustakaan</center></h3>
    <hr>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPinjamTambah"> 
        Tambah Data Peminjaman 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pinjam</td>
                <td align="center">Nama Petugas</td>
                <td align="center">Nama Siswa</td>
                <td align="center">Judul Buku</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pinjam as $index=>$p)
            {{-- Tabel Peminjaman --}}
                <tr>
                    <td align="center" scope="row">{{ $index + $pinjam->firstItem() }}</td>
                    <td align="center">{{$p->idpinjam}}</td>
                    <td>{{$p->petugas->namapetugas}}</td>
                    <td>{{$p->siswa->namasiswa}}</td>
                    <td>{{$p->buku->judul}}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalPinjamEdit{{$p->idpinjam}}"> 
                            Edit
                        </button>
                        |
                        <a href="pinjam/hapus/{{$p->idpinjam}}" onclick="return confirm('Apakah Anda yakin ingin menghapus data peminjam?')">
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
    Halaman : {{ $pinjam->currentPage() }} <br />
    Jumlah Data : {{ $pinjam->total() }} <br />
    Data Per Halaman : {{ $pinjam->perPage() }} <br />

    {{ $pinjam->links() }}
    <!--akhir pagination-->
    
    <!-- Awal Modal tambah data Peminjaman -->
    <div class="modal fade" id="modalPinjamTambah" tabindex="-1" role="dialog" aria-labelledby="modalPinjamTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPinjamTambahLabel">Form Input Data Peminjaman</h5>
                </div>
                <div class="modal-body">

                    <form name="formpinjamtambah" id="formpinjamtambah" action="/pinjam/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="idpetugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="idpetugas" name="idpetugas" placeholder="Pilih Nama Petugas">
                                    <option></option>
                                    @foreach($petugas as $pt)
                                        <option value="{{ $pt->idpetugas }}">{{ $pt->namapetugas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="idsiswa" class="col-sm-4 col-form-label">Nama Siswa</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="idsiswa" name="idsiswa" placeholder="Pilih Nama Siswa">
                                    <option></option>
                                    @foreach($siswa as $s)
                                        <option value="{{ $s->idsiswa }}">{{ $s->namasiswa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="idbuku" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="idbuku" name="idbuku" placeholder="Pilih Judul Buku">
                                    <option></option>
                                    @foreach($buku as $bk)
                                        <option value="{{ $bk->idbuku }}">{{ $bk->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="pinjamtambah" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Peminjaman -->

    @foreach ($pinjam as $index=>$p)
    <!-- Awal Modal EDIT data Peminjaman -->
    @foreach ($pinjam as $index=>$p)
    <div class="modal fade" id="modalPinjamEdit{{$p->idpinjam}}" tabindex="-1" role="dialog" aria-labelledby="modalPinjamEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPinjamEditLabel">Form Edit Data Peminjaman</h5>
                </div>
                <div class="modal-body">

                    <form name="formpinjamedit" id="formpinjamedit" action="/pinjam/edit/{{ $p->idpinjam}} " method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="idpinjam" class="col-sm-4 col-form-label">ID Pinjam</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="idpinjam" name="idpinjam" value="{{ $p->idpinjam}}" readonly>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="idpetugas" name="idpetugas">
                                    @foreach ($petugas as $pt)
                                        @if ($pt->idpetugas == $p->idpetugas)
                                            <option value="{{ $pt->idpetugas }}" selected>{{ $pt->namapetugas }}</option>
                                        @else
                                            <option value="{{ $pt->idpetugas }}">{{ $pt->namapetugas }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="siswa" class="col-sm-4 col-form-label">Nama Siswa</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="idsiswa" name="idsiswa">
                                    @foreach ($siswa as $s)
                                        @if ($s->idsiswa == $p->idsiswa)
                                            <option value="{{ $s->idsiswa }}" selected>{{ $s->namasiswa }}</option>
                                        @else
                                            <option value="{{ $s->idsiswa }}">{{ $s->namasiswa }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="idbuku" name="idbuku">
                                    @foreach ($buku as $bk)
                                        @if ($bk->idbuku == $p->idbuku)
                                            <option value="{{ $bk->idbuku }}" selected>{{ $bk->judul }}</option>
                                        @else
                                            <option value="{{ $bk->idbuku }}">{{ $bk->judul }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="pinjamtambah" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Akhir Modal EDIT data Peminjaman -->
    @endforeach

@endsection