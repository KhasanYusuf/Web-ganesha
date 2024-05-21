@extends('layout/main')

@section('container')
<h3 align="center">Kami melayani perbaikan alat</h3>
<form style="display: flex; flex-direction: column; align-items: center;" action="{{ route('reparation.store') }}" method="POST">
    @csrf
    <div class="row" style="margin-top: 20px">
        {{-- @if(session('success'))
        <div class="alert alert-success" role="alert" style="max-width: 600px">
            {{ session('success') }} jika belum otomatis pindah ke whatsapp, klik <a href="whatsapp_link" style="color: blue">link ini</a>
        </div>
    @endif --}}
        <div class="col-mb-10">
          <label for="name" class="form-label">Nama Barang</label>
          <input class="form-control" id="name" name="name" aria-describedby="Help" required>
          <div id="Help" class="form-text"></div>
        </div>
        <div class="form-floating col-mb-10">
            <label for="request">Permintaan</label>
            <textarea class="form-control" placeholder="Isi deskripsi dan permintaan untuk perbaikan alat anda" id="request" name="request" style="height: 100px;margin-top:50px" required></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary" style="margin: 20px">Submit</button>
        </div>
    </div>
</form>
<script>
    // Periksa jika ada pesan WhatsApp dalam session
    @if(session('whatsapp_link'))
        // Buka link WhatsApp dalam tab baru
        window.open("{{ session('whatsapp_link') }}", "_blank");
    @endif
</script>
@endsection
