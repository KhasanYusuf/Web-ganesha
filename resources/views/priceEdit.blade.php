@extends('layout/main')

@section('container')
<form style="display: flex; flex-direction: column; align-items: center;" action="{{ route('shipmentlist.edit') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-mb-10">
          <label for="price" class="form-label">Edit harga</label>
          <input class="form-control" id="price" name="price" aria-describedby="Help" value="{{$edit->price}}">
          <input type="hidden" id="type" name="type" aria-describedby="Help" value="{{$type}}">
          <input type="hidden" id="id" name="id" aria-describedby="Help" value="{{$edit->id}}">
          <div id="Help" class="form-text"></div>
          {{-- <p>{{$type}}</p>
          <p>{{$edit->id}}</p> --}}
        </div>
        <div>
            <button type="submit" class="btn btn-primary" style="margin: 20px">Submit</button>
        </div>
    </div>
</form>
@endsection
