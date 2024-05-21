<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    //Menampilkan seluruh produk
    public function index()
    {
        $title = 'Semua Produk kami';
        
        $added = request('added') == 2;
        //sementara
        $orderId = 1;
        $productId = 1;
        // Dapatkan daftar produk
        $products = produk::all();

        // Tampilkan halaman produk dengan status tambahan
        return view('product', compact('title','products', 'added', 'orderId', 'productId'));
    }

    //menampilkan laman insert hanya bagi admin
    public function insertform()
    {
        // Pastikan hanya admin yang dapat mengakses
        if (!Auth::user()->is_admin) {
            abort(403, 'Anda bukan Admin');
        }
        $title = 'Masukkan produk';
        // Tampilkan ke view
        return view('insert', compact('title'));
    }
    public function delete(Request $request)
    {
        $id = $request->input('produk_id');
        $product = Produk::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }

    
    public function create()
    {
        //
    }

    //menambahkan produk kedalam tabel produk
    public function store(StoreprodukRequest $request)
    {
        // dd($request->file('picture'));
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('product_image', 'public');
        } else {
            $picturePath = null;
        }

        // Simpan data produk ke dalam database
        $product = new Produk();
        $product->name = $validatedData['name'];
        $product->picture = $picturePath;
        $product->category = $validatedData['category'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->save();
        session()->flash('success', 'Data berhasil ditambahkan!');

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }
    public function search(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'search' => 'required|string', // Pastikan input adalah string dan tidak kosong
        ]);
        
        // Ambil data produk yang memiliki nama yang cocok dengan yang dikirimkan melalui formulir
        $searchTerm = $request->input('search');
        $produk = Produk::where('name', 'like', '%' . $searchTerm . '%')->get();
        $title = 'Pencarian untuk '.$searchTerm;

        // Tampilkan hasil pencarian ke dalam view
        return view('search', compact('produk', 'searchTerm','title'));
    }
    public function category($category)
    {
        // Ambil produk yang memiliki kategori yang sama dengan input
        $produk = Produk::where('category', $category)->get();
        $title = 'Pencarian untuk '.$category;

        // Tampilkan hasil pencarian ke dalam view
        return view('kategori', compact('produk', 'category','title'));
    }
    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprodukRequest $request, produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        //
    }
}
