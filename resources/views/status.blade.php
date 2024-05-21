@extends('layout/main')
@php
    $totalPrice = 0;
@endphp
@section('container')
<div class="container">
<div class="row" style="display: flex; justify-content: center; align-items: center;margin: 50px;">
    <div class="col-md-6">
        <h3 style="position:relative;">Status pesanan</h3>
        <div class="container2">
            @if($userOrders->isEmpty())
                <p>Anda belum melakukan pesanan.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>harga</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userOrders as $order)
                        <tr>
                            <td>{{ $order->produk->name }}</td>
                            <td>{{ $order->produk->description }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <div class="col-md-6" style="position:relative;  left:50px">
        <div class="container2">
            <h3 style="position:relative;">Status Reparasi</h3>
            @if($userReparations->isEmpty())
                <p>Anda belum mengirim form reparasi.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Permintaan</th>
                            <th>harga</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userReparations as $reparation)
                        <tr>
                            <td>{{ $reparation->name }}</td>
                            <td>{{ $reparation->request }}</td>
                            <td>{{ $reparation->price }}</td>
                            <td>{{ $reparation->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
</div>

@endsection
