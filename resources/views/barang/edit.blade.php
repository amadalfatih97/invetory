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
            $getSelect = $barang->idsatuan;
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
                    <form action="/barang/update/{{$barang->id}}" method="post">
                        @method('PATCH')
                        @csrf
                        <label for="namabarang" class="form-label">Input Nama barang</label>
                        <div class="mb-3 input-group has-validation">
                            <input type="text" 
                            value="{{old('namabarang',$barang->namabarang)}}" 
                            class="form-control 
                            {{ $errors->get('namabarang') ? 'is-invalid'  : ''}}"
                            id="exampleInputbarang" 
                            name="namabarang"
                            required>
                        </div>
                        <div class="mb-3">
                            <label for="idsatuan" class="form-label">Satuan</label>
                            <select class="form-select  {{ $errors->get('idsatuan') ? 'is-invalid'  : ''}}" name="idsatuan" aria-label="Default select example" required>
                                <option>Pilih Satuan</option>
                                @foreach ($satuans as $item)
                                    <option value="{{$item->id}}" {{$item->id == $getSelect ? 'selected' : ''}}>{{$item->namasatuan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" value="{{old('stok',$barang->stok)}}" class="form-control  
                                {{ $errors->get('stok') ? 'is-invalid'  : ''}}"
                                id="exampleInputstok" name="stok" required>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <textarea class="form-control  {{ $errors->get('lokasi') ? 'is-invalid'  : ''}}" 
                                name="lokasi" 
                                id="exampleFormControlTextarea1" 
                                rows="3" required>{{old('lokasi',$barang->lokasi)}}
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ket" class="form-label">Keterangan</label>
                            <textarea class="form-control  
                            {{ $errors->get('ket') ? 'is-invalid'  : ''}}" 
                            name="ket" id="exampleFormControlTextarea1" 
                            rows="3">{{old('ket',$barang->ket)}}
                            </textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class='btn btn-warning ml-3' href='{{url("barang/list")}}'>Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
