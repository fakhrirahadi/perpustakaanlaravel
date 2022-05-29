<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Perpustakaan Pemweb</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.css">
        <script type="text/javascript" src="{{ asset('assets') }}/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="{{ asset('assets') }}/js/bootstrap.js"></script> 

    </head>

    <body>
        {{-- Container Utama --}}
        <div class="container" style="background:#ccc;">
                @include('menu')
                @include('banner')
                @include('sidebar')
                @include('konten')
                @include('footer')
        </div>
        <!-- <div class="container" style="background:#ccc"> -->
            <!--awal MENU NAVBAR-->
            <!-- <div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/home">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/buku">Data Buku</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/siswa">Data Siswa</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/petugas">Data Petugas</a>
                            </li>

                            <li class="nav-item"> 
                                <a class="nav-link" href="/pinjam">Data Peminjaman</a> 
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>            
            </div> -->
            <!--akhir MENU NAVBAR-->

            <!--awal BANNER-->
            <!-- <div class="col-md-12">
                <img src="{{ asset('gambar') }}/banner.jpg" alt="banner" width="100%" height="250px">
            </div> -->
            <!--akhir BANNER-->

            <!-- <p> -->

            <!-- <div class="col-md-12"> -->
                <!-- <div class="row" style="background:#ccc"> -->
                    <!--awal SIDEBAR-->
                    <!-- <div class="col-md-3">
                        <img src="{{ asset('gambar') }}/sidebar.jpg" alt="sidebar" width="100%" height="100%" >
                    </div> -->
                    <!--akhir SIDEBAR-->

                    <!--awal KONTEN-->
                    <!-- <div class="col-md-9">
                        
                    </div> -->
                    <!--akhir KONTEN-->
                <!-- </div> -->
            <!-- </div> -->

            <!-- <p> -->

            <!--awal FOOTER-->
            <!-- <div class="col-md-12">
                <div class="row" style="background:rgba(63, 67, 102, 0.562)">
                    <div class="col-md-9">
                        <h3>Visi</h3>
                        <p>Terwujudnya Indonesia Cerdas Melalui Gemar Membaca Dengan Memberdayakan Perpustakaan

                        <p>
                        <h3>Misi</h3>
                        <ul>
                            <li>Terwujudnya layanan prima</li>
                            <li>Terwujudnya perpustakaan sebagai pelestari khazanah budaya bangsa</li>
                            <li>Terwujudnya perpustakaan sesuai standar nasional perpustakaan</li>
                        </ul>                     
                    </div>
                    <div class="col-md-3">
                        Project Akhir Pemrograman Web &copy; 2022.
                        <p>
                        Developed by Kelompok 2</div>
                </div>
            </div> -->
            <!--akhir FOOTER-->

        </div>
    </body>
</html>