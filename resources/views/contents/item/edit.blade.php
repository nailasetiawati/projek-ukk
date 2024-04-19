@extends('app.main')

@section('contents')

    <div class="container mt-5">
      
        @foreach ($items as $data)          
        <form action="/item/{{ $data->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Kategori</label>
              <input type="name" class="form-control @error('name')
                is-invalid
              @enderror" name="name" value="{{ $data->name }}">
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
              <label for="exampleInputEmail1">Kategori Barang</label> 
              <select name="kategori_id" id="" class="form-control">
                <option value="{{ $data->Kategori->id }} " selected disabled>{{ $data->Kategori->name }}</option>
                @foreach ($kategori as $c)
                <option value="{{ $c->id }}" >
                  {{ $c->name }}
                </option>
                @endforeach
              </select>
              <label for="exampleInputEmail1">Harga</label>
              <input type="number" name="price" class="form-control @error('price')
                is-invalid
              @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->price }}">
              @error('price')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <label for="exampleInputEmail1">Gambar</label>
            <input type="file" id="image" class="form-control @error('image')
              is-invalid
            @enderror" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            <img class="img-account-profile mt-3 mb-4 img-thumbnail img-preview"
            src="/img/item-image/{{ $data->image }}" alt="" width="240px" height="520px">
        <div class="small font-italic text-muted mb-4">JPG atau PNG ukuran kurang dari 5 MB</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/item" type="submit" class="btn btn-danger">Cancel</a>
          </form>
        @endforeach
    </div>
    
@endsection