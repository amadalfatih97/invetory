@extends('welcome')

@section('main')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th colspan=2>Aksi</th>
                </thead>
                <tbody>
                    @foreach($barangs as $data)
                    <tr>
                        <td>{{$data->namabarang}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection