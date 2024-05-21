<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'produk_id' => 'required|exists:produks,id', // Pastikan produk_id ada dalam tabel produks
            // Anda mungkin perlu menambahkan validasi lain sesuai kebutuhan
        ]);
         // Ambil data dari form
        $data = $request->all();

        // Ambil harga produk berdasarkan id_produk
        $product = produk::findOrFail($data['produk_id']);
        $data['price'] = $product->price;

        // Membuat pesanan baru
        $order = new Order();
        $order->user_id = auth()->user()->id; // Mengambil user_id dari user yang sedang login
        $order->status = 'saved'; // Anda bisa mengubah status sesuai dengan kebutuhan
        $order->produk_id = $request->produk_id; // Mengambil produk_id dari request
        $order->price = $data['price']; // Mengambil price produk_id dari request
        $order->save();

        session()->flash('success', 'Produk berhasil ditambahkan ke dalam pesanan.');
        // Redirect ke laman katalog atau halaman lain jika perlu
        return redirect()->route('product.view')->with('success', 'Produk berhasil ditambahkan ke dalam pesanan.');
    }
    public function showOrder()
    {
        // Mendapatkan id pengguna yang sedang login
        $userId = auth()->user()->id;
        $title = 'Pesanan Anda';

        // Mengambil semua pesanan dengan status 'pending' yang dimiliki oleh pengguna yang sedang login
        $orders = Order::with('produk') // Menggunakan eager loading untuk memuat relasi produk
                       ->where('user_id', $userId)
                       ->where('status', 'saved')
                       ->get();

        // Menghitung total harga dari produk yang muncul di view
        $totalPrice = $orders->sum(function ($order) {
            return $order->produk->price;
        });

        // Membuat pesan WhatsApp dengan daftar produk yang dipesan dan total harga
        $whatsappMessage = "Pesanan Anda:\n";
        foreach ($orders as $order) {
            $whatsappMessage .= "- " . $order->produk->name . "\n";
        }
        $whatsappMessage .= "Harga Total = " . $totalPrice;

        // Mengembalikan view dengan data transaksi
        return view('transaksi', compact('orders','title','totalPrice','whatsappMessage'));
    }
    public function sendWhatsAppMessage(Request $request)
    {
        // Validasi nomor WhatsApp dan pesan
        $request->validate([
            'message' => 'required',
        ]);
        $userId = auth()->user()->id;
        $orders = Order::with('produk') // Menggunakan eager loading untuk memuat relasi produk
                       ->where('user_id', $userId)
                       ->where('status', 'saved')
                       ->update(['status' => 'pending']);
        

        $phone_num = '6285895710985';
        // Mengirim pesan WhatsApp dengan nomor yang ditentukan
        $whatsappLink = "https://wa.me/$phone_num?text=" . urlencode($request->message);
        
        return redirect($whatsappLink);
    }
    public function deleteItem(Request $request)
    {
        // Validasi request untuk memastikan ID ada
        $request->validate([
            'id' => 'required',
        ]);

        // Ambil ID yang dikirim dari request
        $orderId = $request->id;

        // Hapus item dengan ID yang sesuai dari database
        Order::findOrFail($orderId)->delete();

        // Redirect atau berikan respons yang sesuai setelah penghapusan berhasil
        return redirect()->back()->with('success', 'Item has been deleted successfully!');
    }

}
