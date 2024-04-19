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
              <td><img src="/img/item-image/{{ $data->image }}" width="120px" height="120px"></td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->Kategori->name }}</td>
              <td>Rp. {{ number_format($data->price,2,',','.') }}</td>
              <td>
                 <a href="/item/{{ $data->id }}/edit" class="btn btn-primary">Edit</a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{ $data->id }}">Hapus</button>
              </td>
            </tr>
            <div class="modal fade" id="modalDelete{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Perhatian!</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          Apakah anda yakin akan menghapus barang {{ $data->name }}?
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                          <a href="/item/{{ $data->id }}/delete" class="btn btn-outline-danger">Yakin</a>
                      </div>
                  </div>
              </div>
          </div>
            @endforeach
        </tbody>
      </table>
</div>

@endsection