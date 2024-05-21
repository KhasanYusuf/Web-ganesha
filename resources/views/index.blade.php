@extends('layout/main')

@section('container')
    <div class="box">
        <div class="row">
            <div class="col-md-6">
                <div class="box" style="padding: 10%">
                    <div class="heading-container" style="margin: auto">
                        <h2>Selamat Datang di GANESHA
                        </h2>
                        <p style="font-size: 20px; color:white; margin-bottom: 30px">Gudang Alat Pertanian dan Produk UMKM Desa Gogorante, Kabupaten Kediri.</p>
                        @if (Auth::check())
                        <div class="btn" href="#" style="color: var(--primary-color)">Anda sudah login</div>
                        @else
                            <a href="/register"><div class="btn" style="color: var(--primary-color)">Mulai Sekarang</div></a>
                        @endif
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                    <img src="/image/man.png" alt="man">
            </div>
        </div>
    </div>

    <h1>PRODUK KAMI</h1>
    <div class="container">
        <div class="row">
        <div class="kcontainer">
            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="/image/kategori1.jpg">
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Pacul adalah alat pertanian dengan gagang panjang dan kepala datar, digunakan untuk menggali tanah atau memindahkan material pertanian. Meskipun telah digantikan oleh alat modern, pacul tetap menjadi simbol pertanian tradisional dan keterhubungan manusia dengan tanah.</p>
                            <a href="/kategori/cangkul" class="btn btn-primary" style="text-align: center;display: block; margin: 0 auto;margin-top:10px;color:white">Cangkul</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="/image/pisau.jpg">
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Pisau sawah adalah alat pertanian yang digunakan untuk memotong tanaman padi atau tanaman lainnya di sawah. Biasanya terbuat dari baja tahan karat yang tajam dan memiliki gagang kayu atau plastik untuk memudahkan penggunaan.</p>
                        <a href="/kategori/pisau" class="btn btn-primary" style="text-align: center;display: block; margin: 0 auto;margin-top:10px;color:white">Pisau</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kcontainer">
            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="/image/arit.jpg">
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Arit adalah sebuah alat pertanian yang digunakan untuk memotong rumput, gulma, atau tanaman semusim lainnya di area pertanian atau kebun. Alat ini terdiri dari sebilah pisau yang terhubung dengan gagang panjang, biasanya terbuat dari kayu atau logam. Arit digunakan dengan cara mengayunkannya secara horizontal untuk memotong tanaman dengan cepat dan efisien.</p>
                    <div class="content">
                        <a href="/kategori/arit" class="btn btn-primary" style="text-align: center;display: block; margin: 0 auto;margin-top:10px;color:white">Arit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="/image/lainnya.jpg">
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">

                        <p>
                            Berbagai benda lainnya seperti gagang cangkul, linggis dan lain-lain. digunakan untuk berbagai keperluan di lahan pertanian, mulai dari menggali tanah hingga memotong tanaman. Setiap alat memiliki peran khusus dalam meningkatkan produktivitas dan efisiensi dalam kegiatan pertanian.</p>
                            <a href="/kategori/lainnya" class="btn btn-primary" style="text-align: center;display: block; margin: 0 auto;margin-top:10px;color:white">lainnya</a>
                    </div>
                </div>
            </div>

    </div>
    </div>

    <div class="box2">
        <div class="row">
            <div class="col">
                <img src="/image/man2.png" alt="man">
            </div>
            <div class="col" >
                <h2>Jangan Lewatkan Penawaran Terbaik Kami!
                </h2>
                <p style="font-size: 20px; color:white; margin-bottom: 30px">Peralatan pertanian dengan kualitas tinggi dan dibuat oleh tangan seorang pandai besi</p>
                <a href="/product_view"><div class="btn" href="/product" style="color: var(--primary-color)">Lihat Produk</div></a>
                <p style="font-size: 15px; color:white; margin-top: 30px">Alat anda rusak? perbaiki <a href="/reparation">disini</a></p>
            </div>
        </div>
    </div>
    <h1 style="margin-top: -50px">MENGAPA BELANJA DI GANESHA?</h1>
    <div class="why"style="margin-top: 50px">
        <div class="sbox">
            <img src="/image/muscle.png" alt="strong" style="max-width: 60%">
            <h2 style="font-size: xx-large; font-weight: 600px">Alat pertanian yang berkualitas</h2>
        </div>
        <div class="sbox">
            <img src="/image/money.png" alt="strong" style="max-width: 60%">
            <h2 style="font-size: xx-large; font-weight: 600px">Harga terjangkau dan dapat ditawar</h2>
        </div>
        <div class="sbox">
            <img src="/image/shipping.png" alt="strong" style="max-width: 60%">
            <h2 style="font-size: xx-large; font-weight: 600px">Pengiriman cepat dan terpercaya</h2>
        </div>
    </div>

@endsection
