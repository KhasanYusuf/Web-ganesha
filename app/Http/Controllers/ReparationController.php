<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReparationRequest;
use App\Http\Requests\UpdateReparationRequest;
use Illuminate\Support\Facades\Auth;

class ReparationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Formulir perbaikan alat';

        // Tampilkan halaman produk dengan status tambahan
        return view('reparation', compact('title'));
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
    public function store(StoreReparationRequest $request)
    {
        // Validasi input form di sini jika diperlukan
        $request->validate([
            'name' => 'required',
            'request' => 'required',
        ]);

        // Buat objek Reparation dan isi dengan data dari form
        $reparation = new Reparation();
        $reparation->name = $request->input('name');
        $reparation->request = $request->input('request');
        $reparation->status = 'pending';
        $reparation->user_id = Auth::id();
        // Tambahkan data ke dalam tabel reparations
        $reparation->save();

        session()->flash('success', 'Data berhasil ditambahkan! anda dialihkan ke whatsapp dan mohon konfirmasi pesanan disana');
        $whatsappMessage = "Permintaan reparasi:\n";
        $whatsappMessage .= "nama barang = ".$request->input('name')."\n";
        $whatsappMessage .= "permintaan = ".$request->input('request')."\n";

        $phone_num = '6285895710985';
        // Mengirim pesan WhatsApp dengan nomor yang ditentukan
        $whatsappLink = "https://wa.me/$phone_num?text=" . urlencode($whatsappMessage);

        // Redirect ke halaman yang sesuai setelah penyimpanan data berhasil
        return redirect($whatsappLink);
        // return redirect()->back()->with('success', 'Permintaan Anda telah dikirim. Mohon konfirmasi pesanan di WhatsApp.')->with('whatsapp_link', $whatsappLink);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reparation $reparation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reparation $reparation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReparationRequest $request, Reparation $reparation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reparation $reparation)
    {
        //
    }
}
