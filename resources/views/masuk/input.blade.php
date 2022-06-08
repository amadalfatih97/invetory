@extends('master')

@section('main')
<div class="card container-fluid py-3 px-md-4">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <strong>Data Invetory</strong>
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
            $getSelect = old('idsatuan');
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
                    <div class="input-cek mb-3 d-flex">
                        <div class="form-check me-3 radio_wrap" data-radio="radio_1">
                            <input class="form-check-input" type="radio" name="typeinput" id="type-input2" value="1"
                            checked>
                            <label class="form-check-label" for="type-input2">
                                Barang Sudah Ada
                            </label>
                        </div>
                        <div class="form-check radio_wrap" data-radio="radio_2">
                            <input class="form-check-input" type="radio" name="typeinput" id="type-input1" value="0"
                                 >
                            <label class="form-check-label" for="type-input1">
                                Barang Baru
                            </label>
                        </div>
                    </div>
                    <div class="content">
                        <div class="radio_content radio_1" id="barang-lama">
                            <form action="{{url('/barang-masuk/add')}}" method="post">
                                @csrf
    
                                <div class="mb-3">
                                    <label for="kodebarang" class="form-label">Nama Barang</label>
                                    <select {{count($barangs) < 1 ? 'disabled' : ''}} class="form-select  {{ $errors->get('kodebarang') ? 'is-invalid'  : ''}}"
                                        name="kodebarang" aria-label="Default select example"
                                         required>
                                        <option>Pilih Barang</option>
                                        @foreach ($barangs as $item)
                                        <option value="{{$item->kode}}" {{$item->kode == old('kodebarang') ? 'selected' : ''}}>
                                            {{$item->namabarang}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="qty" class="form-label">Quantity</label>
                                    <input type="number" value="{{old('qty')}}" class="form-control  
                                    {{ $errors->get('qty') ? 'is-invalid'  : ''}}" id="exampleInputstok" name="qty"
                                    {{count($barangs) < 1 ? 'disabled' : ''}}  required>
                                </div>
    
                                <div class="mb-3">
                                    <label for="tanggalmasuk" class="form-label">Tanggal Masuk</label>
                                    <input {{count($barangs) < 1 ? 'disabled' : ''}} type="text" id="picker" name="tanggalmasuk" 
                                    class="form-control" required readonly>
                                </div>
                                <button {{count($barangs) < 1 ? 'disabled' : ''}} type="submit" class="btn btn-primary">Submit</button>
                                <a class='btn btn-warning ml-3' href='{{url("barang-masuk/list")}}'>Cancel</a>
                            </form>
                        </div>
                        <div class="radio_content radio_2" id="barang-baru">
                            <form action="{{url('/barang/add')}}" method="post">
                                @csrf
    
                                <label for="kode" class="form-label">Kode barang</label>
                                <div class="mb-3 input-group has-validation">
                                    <input type="text" value="{{'INV0'.$last}}" class="form-control" 
                                    id="exampleInputbarang" name="kode" readonly required>
                                </div>
                                <label for="namabarang" class="form-label">Input Nama barang</label>
                                <div class="mb-3 input-group has-validation">
                                    <input type="text" value="{{old('namabarang')}}" class="form-control 
                                    {{ $errors->get('namabarang') ? 'is-invalid'  : ''}}" id="exampleInputbarang"
                                        name="namabarang" required>
                                </div>
                                <div class="mb-3">
                                    <label for="idsatuan" class="form-label">Satuan</label>
                                    <select class="form-select  {{ $errors->get('idsatuan') ? 'is-invalid'  : ''}}"
                                        name="idsatuan" aria-label="Default select example" required>
                                        <option>Pilih Satuan</option>
                                        @foreach ($satuans as $item)
                                        <option value="{{$item->id}}" {{$item->id == $getSelect ? 'selected' : ''}}>
                                            {{$item->namasatuan}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="number" value="{{old('stok')}}" class="form-control  
                                    {{ $errors->get('stok') ? 'is-invalid'  : ''}}" id="exampleInputstok" name="stok"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggalmasuk" class="form-label">Tanggal Masuk</label>
                                    <input type="text" id="picker2" readonly name="tanggalmasuk" 
                                    class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <textarea class="form-control  {{ $errors->get('lokasi') ? 'is-invalid'  : ''}}"
                                        name="lokasi" id="exampleFormControlTextarea1" rows="3"
                                        required>{{old('lokasi')}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="ket" class="form-label">Keterangan</label>
                                    <textarea class="form-control  
                                        {{ $errors->get('ket') ? 'is-invalid'  : ''}}" name="ket"
                                        id="exampleFormControlTextarea1" rows="3">{{old('ket')}} </textarea>
                                </div>
                                <button  type="submit" class="btn btn-primary">Submit</button>
                                <a class='btn btn-warning ml-3' href='{{url("barang-masuk/list")}}'>Cancel</a>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{asset('js')}}/main.js" ></script>
@endpush
