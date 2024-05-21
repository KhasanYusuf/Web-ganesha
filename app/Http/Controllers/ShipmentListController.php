<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipmentList;
use App\Models\Order;
use App\Models\Reparation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShipmentListRequest;
use App\Http\Requests\UpdateShipmentListRequest;
use Illuminate\Support\Facades\Auth;

class ShipmentListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pastikan hanya admin yang dapat mengakses
        if (!Auth::user()->is_admin) {
            abort(403, 'Anda bukan Admin');
        }
        
        $title = 'Shipment List';
        // Ambil semua data shipment lists
        $shipmentLists = ShipmentList::with('order.user', 'reparation.user')->get();

        // Tampilkan ke view
        return view('shipmentlist', compact('title','shipmentLists'));
    }
    public function userStatus()
    {
        $userId = auth()->user()->id;
        $title = 'Status Pesanan Anda';

        $orders = Order::where('user_id', $userId)
                ->where('status', '!=', 'saved')
                ->get();
        $reparations = Reparation::where('user_id', $userId)
                ->get();

        $userOrders = $orders->sortBy(function ($order) {
            return $order->status === 'selesai' ? 0 : 1;
        });
        $userReparations = $reparations->sortBy(function ($reparation) {
            return $reparation->status === 'selesai' ? 0 : 1;
        });
        return view('status', compact('title','userOrders','userReparations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreShipmentListRequest $request)
    // {
    //     //
    // }
    public function store()
    {
        // Ambil semua pesanan dari tabel orders
        $orders = Order::where('status', 'pending')
              ->get();

        // Simpan pesanan ke dalam tabel shipmentlists
        foreach ($orders as $order) {
            ShipmentList::updateOrCreate(
                [
                    'order_id' => $order->id, // Kriteria pencarian
                ],
                ['user_id' => $order->user_id] // Data yang akan disimpan
            );
        }

        // Ambil semua perbaikan dari tabel reparations
        $reparations = Reparation::where('status', 'pending')
                    ->get();

        // Simpan perbaikan ke dalam tabel shipmentlists
        foreach ($reparations as $reparation) {
            ShipmentList::updateOrCreate(
                ['reparation_id' => $reparation->id], // Kriteria pencarian
                ['user_id' => $reparation->user_id] // Data yang akan disimpan
            );
        }

        // Redirect atau berikan respons yang sesuai setelah penyimpanan berhasil
        return redirect()->back()->with('success', 'Shipment list updated successfully!');
    }
    public function get(Request $request)
    {
        $title = "Edit Harga";
        $id = $request->input('id');
        $price = $request->input('price');
        $type = $request->input('type');
        if ($type === 'order' ) {
            $edit = Order::findOrFail($id);
        }else {
            $edit = Reparation::findOrFail($id);
        }
        // dd($edit);
        return view('priceEdit', compact('title','edit','type'));
    }

    public function editPrice(Request $request)
    {
        if ($request->input('type') === 'order' ) {
            Order::where('id', $request->input('id'))->update(['price' => $request->input('price')]);
        }else {
            Reparation::where('id', $request->input('id'))->update(['price' => $request->input('price')]);
        }
        return redirect('shipmentlist');

    }

    public function finish(Request $request)
    {
        // Ambil ID order dari request
        $shipmentId = $request->input('shipmentId');
        if ($request->input('type') === 'order' ) {
            Order::where('id', $request->input('id'))->update(['status' => 'selesai']);
        }else {
            Reparation::where('id', $request->input('id'))->update(['status' => 'selesai']);
        }
        // Ubah status order menjadi "selesai"

        // Hapus data dari tabel ShipmentList berdasarkan order_id
        ShipmentList::where('id', $shipmentId)->delete();

        return redirect()->back()->with('success', 'Pengiriman berhasil diselesaikan');
    }


    /**
     * Display the specified resource.
     */
    public function show(ShipmentList $shipmentList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShipmentList $shipmentList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShipmentListRequest $request, ShipmentList $shipmentList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShipmentList $shipmentList)
    {
        //
    }
}
