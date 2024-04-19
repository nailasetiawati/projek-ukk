@extends('app.main')

@section('contents')

    <div class="container mt-5">
      @foreach ($kategoris as $data)  
      <form action="/kategori/{{ $data->id }}/edit" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Kategori</label>
          <input type="name" class="form-control" name="name" value="{{ $data->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/kategori" type="submit" class="btn btn-danger">Cancel</a>
      </form>
      @endforeach
    </div>
    
@endsection