@extends('layout/main')

@section('container')
<div class="container">
    <h2 style="color: black">Shipment Lists</h2>
    <form action="{{ route('shipmentlist.store') }}" method="POST">@csrf<button class="btn btn-primary">refresh</button></form>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Pemesan</th>
                <th>no.Hp</th>
                <th>alamat</th>
                <th>Tanggal Pemesanan</th>
                <th>Type</th>
                <th>detail</th>
                <th>harga sepakat</th>
                <th>Progress</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shipmentLists as $shipmentList)
            <tr>
                <td>{{ $shipmentList->id }}</td>
                @if($shipmentList->order_id !== null)
                <td>{{ $shipmentList->order->user->name ?? '-' }}</td>
                <td><a href="https://wa.me/{{ $shipmentList->order->user->phone_num ?? '-' }}">{{ $shipmentList->order->user->phone_num ?? '-' }}</a></td>
                <td>{{ $shipmentList->order->user->address ?? '-' }}</td>
                <td>{{ $shipmentList->order->created_at->format('Y-m-d H:i:s') ?? '-' }}</td>
                @else
                <td>{{ $shipmentList->reparation->user->name ?? '-' }}</td>
                <td><a href="https://wa.me/{{ $shipmentList->reparation->user->phone_num ?? '-' }}">{{ $shipmentList->reparation->user->phone_num ?? '-' }}</a></td>
                <td>{{ $shipmentList->reparation->user->address ?? '-' }}</td>
                <td>{{ $shipmentList->reparation->created_at->format('Y-m-d H:i:s') ?? '-' }}</td>
                @endif
                <td>@if($shipmentList->order_id === null)
                    Reparasi
                @else
                    Order
                @endif</td>
                <td>
                    @if($shipmentList->order_id !== null)
                        {{ $shipmentList->order->produk->name ?? '-' }}
                    @else
                        {{ $shipmentList->reparation->request ?? '-' }}
                    @endif
                </td>
                <td>
                    @if($shipmentList->order_id !== null)
                        Rp {{ $shipmentList->order->price ?? '-' }}
                        <form action="{{route('shipmentlist.get')}}" method="post">@csrf 
                            <input type="hidden" name="id" value="{{$shipmentList->order_id}}">
                            <input type="hidden" name="price" value="{{$shipmentList->order->price}}">
                            <input type="hidden" name="type" value="order">
                            <button class="btn btn-warning">edit</button>
                        </form>
                    @else
                        Rp {{ $shipmentList->reparation->price ?? '-' }}
                        <form action="{{route('shipmentlist.get')}}" method="post">@csrf 
                            <input type="hidden" name="id" value="{{$shipmentList->reparation_id}}">
                            <input type="hidden" name="price" value="{{$shipmentList->reparation->price}}">
                            <input type="hidden" name="type" value="reparation">
                            <button class="btn btn-warning">edit</button></form>
                    @endif
                </td>
                <td><form action="{{route('shipmentlist.finish')}}" method="post">
                    @csrf
                    <input type="hidden" name="shipmentId" value="{{$shipmentList->id}}">
                    @if($shipmentList->order_id)
                        <input type="hidden" name="id" value="{{ $shipmentList->order->id}}" >
                        <input type="hidden" name="type" value="order" >
                    @else
                        <input type="hidden" name="id" value="{{ $shipmentList->reparation->id}}" >
                        <input type="hidden" name="type" value="reparation" >
                    @endif
                    <button class="btn btn-warning">Selesai</button>
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
