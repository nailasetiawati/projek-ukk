@extends('app.main')

@section('contents')
    
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Waktu</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td><a href="">NTRX001</a></td>
                <td>Rp. 120.500</td>
                <td>18-04-2024</td>
              </tr>
            </tbody>
          </table>
    </div>

@endsection