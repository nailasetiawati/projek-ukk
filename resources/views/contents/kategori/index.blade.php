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
    <a href="/kategori/tambah">
        <button type="button" class="btn btn-primary">+Tambah</button>
    </a>
    <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kategoris as $data)           
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $data->name }}</td>
            <td>
                <a href="/kategori/{{ $data->id }}/edit">
                    <button type="button" class="btn btn-warning">Edit</button>
                </a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{ $data->id }}">Hapus</button>
            </td>
          </tr>
          {{-- Modal Delete --}}
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
                        Apakah anda yakin akan menghapus kategori {{ $data->name }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                        <a href="/kategori/{{ $data->id }}/delete" class="btn btn-outline-danger">Yakin</a>
                    </div>
                </div>
            </div>
        </div>
          @endforeach
        </tbody>
      </table>
</div>

@endsection