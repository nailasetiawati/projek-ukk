@extends('app.main')

@section('contents')

    <div class="container mt-5">
        <form action="/item/tambah" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Barang</label>
              <input type="text" class="form-control @error('name')
                is-invalid
              @enderror" name="name">
              @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              <label for="exampleInputEmail1">Kategori Barang</label>
             <select name="kategori_id" class="form-control">
              <option disabled>Pilih Kategori....</option>
              @foreach ($kategoris as $data)
                <option value="{{ $data->id }}">{{ $data->name }}</option>
              @endforeach
             </select>
              @error('items')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              <label for="exampleInputEmail1">Harga</label>
              <input type="number" class="form-control @error('price')
                is-invalid
              @enderror" name="price">
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
                            src="https://thumbs.dreamstime.com/b/no-image-vector-symbol-missing-available-icon-gallery-moment-placeholder-248879067.jpg" alt="" width="240px" height="520px">
                        <div class="small font-italic text-muted mb-4">JPG atau PNG ukuran kurang dari 5 MB</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/item" type="submit" class="btn btn-danger">Cancel</a>
          </form>
    </div>
@endsection