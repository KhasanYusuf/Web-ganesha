@extends('layout/main')
@php
    $totalPrice = 0;
@endphp
@section('container')
<div class="container">
    <h2 style="position:relative; left:60px; color:black">Transaksi</h2>
<div class="row" style="display: flex; justify-content: center; align-items: center;margin: 50px;">
    <div class="col-md-6">
        <div class="container2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>harga</th>
                        <th></th>
                        <th>Total Harga</th>
                        <!-- Tambahkan kolom lain sesuai kebutuhan -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->produk->name }}</td>
                        <td>{{ $order->produk->description }}</td>
                        <td>{{ $order->produk->price }}</td>
                        <td>
                            <form action="{{ route('order.delete') }}" method="post">
                                @csrf
                                {{-- {{$order->id}} --}}
                                <input type="hidden" name="id" id="id" value="{{$order->id}}">
                                <button type="submit" class="btn btn-danger" style="--bs-btn-padding-y: .0rem; --bs-btn-padding-x: .0rem; --bs-btn-font-size: .75rem;" >hapus</button>
                            </form>
                        </td>
                        @php
                            $totalPrice += $order->produk->price; // Menambahkan harga produk ke total harga
                        @endphp
                    
                    @endforeach
                        <td>Total Harga : {{$totalPrice }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6" style="position:relative;  left:50px">
        <form id="whatsapp-form" action="{{ route('order.send.whatsapp') }}" method="post">
            @csrf
            <input type="hidden" name="id-list" id="whatsapp-message" value="{{$whatsappMessage}}"> <!-- Pesan WhatsApp -->
            <input type="hidden" name="message" id="whatsapp-message" value="{{$whatsappMessage}}"> <!-- Pesan WhatsApp -->
            <button type="submit" ><img src="image/wa2.png" style="width:400px;height:auto"></button>
        </form>
    </div>
</div>
</div>

@endsection
