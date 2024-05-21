
@extends('layout/main')

@section('container')
 <div class="container">
    <!-- Row 1: Slot gambar untuk link ke kategori -->
    <div class="row">
        <div class="category">
            <a href="/kategori/cangkul" class="category-link">
                <div class="category-image" style="background-image: url('image/kategori1.jpg');">
                    <span class="category-text">Cangkul/Pacul</span>
                </div>
            </a>
        </div>
        <div class="category">
            <a href="/kategori/pisau" class="category-link">
                <div class="category-image" style="background-image: url('image/pisau.jpg');">
                    <span class="category-text">Pisau</span>
                </div>
            </a>
        </div>
        <div class="category">
            <a href="/kategori/arit" class="category-link">
                <div class="category-image" style="background-image: url('image/arit.jpg');">
                    <span class="category-text">Arit/Clurit</span>
                </div>
            </a>
        </div>
        <div class="category">
            <a href="/kategori/lainnya" class="category-link">
                <div class="category-image" style="background-image: url('image/lainnya.jpg');">
                    <span class="category-text">Lainnya</span>
                </div>
            </a>
        </div>
    </div>



    <script src="/js/app.js"></script>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
{{-- <p>{{$added}}</p> --}}
<div class="row" style="margin: 50px">
    @foreach ($products as $p)
    <div class="card mb-3" style="max-width: 1000px;">
        <div class="row g-0">
            <div class="col-md-1">
                @if($p->picture)
                    <img src="{{ asset('storage/' . $p->picture) }}" class="img-fluid rounded-start" alt="{{ $p->name }}">
                @else
                    <!-- Tampilkan placeholder jika gambar tidak tersedia -->
                    <img src="{{ asset('placeholder.jpg') }}" class="img-fluid rounded-start" alt="{{ $p->name }}">
                @endif
                {{-- <img src="image/placeholder.jpg"  alt="product"> --}}
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$p->name}}</h5>
                    <p class="card-text">{{$p->description}}</p>
                    <p class="card-text">Rp {{$p->price}}</p>
                </div>
            </div>
            <div class="col-md-2" style="padding: 25px">
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $p->id }}">
                    <button type="submit" style="width: 100px" class="btn btn-danger">Order</button>
                </form>
                @if (Auth::user()->is_admin)
                <form action="{{ route('product.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $p->id }}">
                    <button type="submit" style="width: 100px;margin-top:10px" class="btn btn-danger">Hapus</button>
                </form>
                @endif
            </div>
            {{-- <div class="col-md-2" style="padding: 25px">
            </div> --}}
        </div>
    </div>
    @endforeach
</div>

@endsection
