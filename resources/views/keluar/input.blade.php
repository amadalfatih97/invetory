@extends('master')

@section('main')
<div class="card py-2 px-2">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h2>Data Invetory</h2>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6">Dashboard > data barang
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-fluid">

        <?php
            $getSelect = '';
        ?>
        @if ($errors->any())
        <?php
            $getSelect = old('kodebarang');
        ?>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="radio_content radio_1">
                        <form action="{{url('/barang-keluar/add')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="tanggalkeluar" class="form-label">Tanggal Keluar</label>
                                {{-- <input type="date" id="input-date out-date" name="tanggalkeluar" class="form-control" required> --}}
                                <input type="date" id="input-date" name="tanggalkeluar" max="<?= date('Y-m-d'); ?>"
                                     class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="kodebarang" class="form-label">Nama Barang</label>
                                        <select class="form-select select-barang {{ $errors->get('kodebarang') ? 'is-invalid'  : ''}}"
                                            name="kodebarang" aria-label="Default select example" required>
                                            <option>Pilih Barang</option>
                                            @foreach ($barangs as $item)
                                            <option value="{{$item->kode}}"
                                                {{$item->kode == $getSelect ? 'selected' : ''}}>
                                                {{$item->namabarang}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label for="stock" class="form-label">Ready</label>
                                        <input type="text" name="stock" readonly class="form-control stok-ready" id="stok-ready">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="qty" class="form-label">Quantity</label>
                                <input type="number" value="{{old('qty')}}" class="form-control  
                                    {{ $errors->get('qty') ? 'is-invalid'  : ''}}" max="5" min="1"
                                    id="exampleInputstok input-qty" name="qty" required>
                            </div>

                            
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a class='btn btn-warning ml-3' href='{{url("barang-keluar/list")}}'>Cancel</a>
                        </form>
                        <div class="my-3">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Satuan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                  </tr>
                                </tbody>
                              </table>
                        
                        </div>
                        <a class='btn btn-success ml-3' href='{{url("barang-keluar/list")}}'>Submit</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('js')}}/main.js"></script>
<script src="{{asset('js')}}/keluar.js"></script>
@endpush
