@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12"><strong>Data Invetory</strong></div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6 text-secondary">Dashboard > Data Barang Keluar
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-md px-md-4">
        <div class="card px-3 py-5">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-12">
                        <a href="{{url('barang-keluar/add')}}" class="btn btn-success mb-3 me-2 ">input</a>
                        <a href='' target="_blank" class="btn btn-primary mb-3"><i class="bi bi-printer"></i> Print</a>
                    </div>
                    <div class="col-md-4 col-sm-12  col-12">
                        <div class="input-group mb-2">
                            <input name="date-start" id="picker-start" readonly placeholder="tanggal awal" type="text" class="form-control">
                            <button class="btn btn-outline-secondary">
                                <i class="bi bi-calendar-event"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12  col-12">
                        <div class="input-group mb-2">
                            <input name="date-end" id="picker-end" readonly placeholder="tanggal akhir" type="text" class="form-control">
                            <button class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Filter" >
                                <i class="bi bi-calendar-event"></i>
                            </button>
                        </div>
                    </div>
                    {{-- <div class="col-md-2">
                        <a href="{{url('barang-keluar/add')}}" class="btn btn-secondary mb-3 me-2 ">filter</a>
                    </div> --}}
                    {{-- <div class="col-md-4 col-sm-12  col-12">
                        <form action='{{url("barang-keluar/list")}}' method="GET">
                            <div class="input-group mb-3">
                                <input name="key" type="text" class="form-control" placeholder="Search" aria-label="Search"
                                    aria-describedby="button-addon2" value="{{Request::get('key')}}">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </form>
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
                                {{-- <th>Kode</th> --}}
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Jumlah Item</th>
                                <th>#</th>
                                {{-- <th class="action" colspan=2>Aksi</th> --}}
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($trans as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    {{-- <td>{{$data->trans_fk}}</td> --}}
                                    <td>{{$data->tanggal_trans}}</td>
                                    <td>{{$data->user_fk}}</td>
                                    <td>{{$data->jumlah}} jenis item</td>
                                    <td><a class="btn btn-outline-primary " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat Detail"
                                        href='{{url("barang-keluar/detail/{$data->trans_fk}")}}'>
                                        <span class="hide-to-mobile">-<<</span><i class="bi bi-eye-fill" ></i><span class="hide-to-mobile">>>-</span>
                                    </a></td>
                                </tr>
                                @endforeach
                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('js')}}/keluar.js"></script>
@endpush