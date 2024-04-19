@extends('app.main')

@section('contents')
    
<div class="container mt-5">
    @if (session('Berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('Berhasil') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <a href="/item/tambah">
        <button type="button" class="btn btn-primary">+Tambah</button>
    </a>
    <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Kategori Barang</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $data)     
            <tr>
              <th scope="row">{{ $loop->iteration  }}</th>
              <td><img src="https://cdn1-production-images-kly.akamaized.net/IXwkGoxNo1fBdDms9BullOXvjLg=/1191x0:3681x3319/469x625/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/2952663/original/065258500_1572335694-2019-10-29.jpg" width="120px" height="120px"></td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->Kategori->name }}</td>
              <td>Rp. {{ $data->price }}</td>
              <td>
                  <a href="/item/edit">
                      <button type="button" class="btn btn-warning">Edit</button>
                  </a>
                  <button type="button" class="btn btn-danger">Hapus</button>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>

@endsection