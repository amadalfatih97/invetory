@extends('master')

@section('main')
<div class="card py-2 px-2">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h2>Data Invetory</h2>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6 text-secondary">Dashboard > Detail Barang Keluar
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <p>Kode {{$kode}}</p>
                    <p>Tanggal</p>
                    <p>nama user</p>
            </div>
            <div class="col-md-12">
                <div class="card ">
                    {{-- <hr > --}}
                    {{-- <div class="container"> --}}

                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Satuan</th>
                            </thead>
                        {{-- </table> --}}
                    {{-- </div> --}}
                    {{-- <hr> --}}
                    {{-- <div class="container-fluid"> --}}

                        {{-- <table width="100%"> --}}
                            @for ($i = 0; $i < 6; $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>namA Item</td>
                                <td>2</td>
                                <td>pcs</td>
                            </tr>
                            @endfor
                        </table>
                    {{-- </div> --}}
                    {{-- <hr> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
