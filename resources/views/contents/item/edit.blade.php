@extends('app.main')

@section('contents')

    <div class="container mt-5">
        @foreach ($item as $data)          
        <form action="/item" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Kategori</label>
              <input type="name" class="form-control" name="name" value="{{ $data->name }}">
              <label for="exampleInputEmail1">Kategori Barang</label>
              <input type="name" class="form-control">
              <label for="exampleInputEmail1">Harga</label>
              <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/item" type="submit" class="btn btn-danger">Cancel</a>
          </form>
        @endforeach
    </div>
    
@endsection