@extends('master')

@section('main')
<div class="card py-2 px-2">
    <div class="row">
        <div class="col-md-6 col-sm-12"><h2>Data Invetory</h2></div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6 text-secondary">Dashboard > Data Barang 
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 ">
                <a href="{{url('barang/add')}}" class="btn btn-success mb-2">input</a>
            </div>
        
            <div class="col-md-4 ">
                <form action='{{url("barang/list")}}' method="GET">
                    <div class="input-group mb-3">
                        <input name="key" type="text" class="form-control" placeholder="Search" aria-label="Search"
                            aria-describedby="button-addon2" value="{{Request::get('key')}}">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @if(session()->get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session()->get('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th class="no">No</th>
                            <th>Nama barang</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th>Lokasi</th>
                            <th>Keterangan</th>
                            <th class="action" colspan=2>Aksi</th>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($barangs as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->namabarang}}</td>
                                <td>{{$data->namasatuan}}</td>
                                <td>{{$data->stok}}</td>
                                <td>{{$data->lokasi}}</td>
                                <td>{{$data->ket}}</td>
                                <td>
                                    <a class="btn btn-outline-primary" href="/barang/{{$data->id}}">Edit</button>
                                </td>
                                <td>
                                    <form action='{{url("barang/delete/{$data->id}")}}' method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
