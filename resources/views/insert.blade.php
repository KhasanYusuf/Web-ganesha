@extends('layout/main')

@section('container')
    <h1>Tambah Produk Baru</h1>
    @if(session('success'))
        <div class="alert alert-success" role="alert" style="max-width: 600px;margin:50px">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('insert.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container col-8" style="margin:50px">
            <label for="name">Nama:</label><br>
            <input class="form-control" type="text" id="name" name="name" required><br><br>

            <label for="picture" class="form-label">masukkan gambar</label>
            <input class="form-control" class="form-control" type="file" id="picture" name="picture"  required>
    
            {{-- <input type="text" id="category" name="category" required><br><br> --}}
            <label for="category">Kategori:</label><br>
            <div class="input-group" >
                <select class="form-select" id="category" name="category">
                  <option selected>pilih...</option>
                  <option value="cangkul">Cangkul</option>
                  <option value="pisau">Pisau</option>
                  <option value="arit">Arit</option>
                  <option value="lainnya">Lainnya</option>
                </select>
              </div>
    
            <label for="description">Deskripsi:</label><br>
            <textarea class="form-control" id="description" name="description" required></textarea><br><br>
    
            <label for="price">Harga:</label><br>
            <input class="form-control" type="number" id="price" name="price" step="0.01" required><br><br>
    
            <button class="btn btn-primary" type="submit">Tambah Produk</button>
        </div>
    </form>
@endsection
