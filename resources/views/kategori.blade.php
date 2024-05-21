@extends('layout/main')

@section('container')
 <!-- Konten -->
<h3>Kategori : {{$category}}</h3>
<section class="produk">
    <h3 class="text-center">Produk</h3>
    <div class="row justify-content-center">
        @if ($produk->isEmpty())
            <p>Produk tidak ditemukan</p>
        @else
        @foreach($produk as $product)
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-1">
                        @if($product->picture)
                            <img src="{{ asset('storage/' . $product->picture) }}" class="img-fluid rounded-start" alt="{{ $product->name }}">
                        @else
                            <!-- Tampilkan placeholder jika gambar tidak tersedia -->
                            <img src="{{ asset('placeholder.jpg') }}" class="img-fluid rounded-start" alt="{{ $product->name }}">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">{{ $product->price }}</p>
                        </div>
                    </div>
                    <div class="col">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $product->id }}">
                            <button type="submit" style="width: 100px" class="btn btn-primary">Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        <!-- Dan seterusnya untuk setiap produk -->
    </div>
</section>
@endsection
