@extends('layout/main')

@section('container')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-6 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="/image/profile.png"><span class="font-weight-bold">{{$user->name}}</span><span class="text-black-50">{{$user->email}}</span><span> 
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Log out</button>
                    </form>
                        
                </span></div>
                <div class="align-items-center text-center">
                    {{-- <a href="/edit" style="color: var(--primary-color)">Edit Profil</a> --}}
                </div>
            </div>
            <div class="col-md-6 border-right">
                <div class="box" style="padding: 25px">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="text-right">Profile</h2>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels" style="color: white">Nama</label>
                                <p>{{$user->name}}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels" style="color: white">Nomer Telepon</label>
                                <p>{{$user->phone_num}}</p>
                            </div>
                            <div class="col-md-12"><label class="labels" style="color: white">Alamat</label>
                                <p>{{$user->address}}</p>
                            </div>
                            <div class="col-md-12"><label class="labels" style="color: white">Email</label>
                                <p>{{$user->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>















@endsection
