@extends('app.main')

@section('contents')

    <div class="container mt-5">
        <form action="/kategori/tambah" method="POST">
          @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Kategori</label>
              <input type="name" class="form-control @error('name')
                is-invalid
              @enderror" name="name">
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/kategori" type="submit" class="btn btn-danger">Cancel</a>
          </form>
    </div>
    
@endsection