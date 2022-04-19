@extends('master')

@section('main')
<div class="card py-2 px-2">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h2>Data Invetory</h2>
        </div>
        <div class="col-md-6 col-sm-12 px-3 text-end align-middle align-self-center hide-to-mobile">
            <span class="fst-italic fs-6">Dashboard > data
            </span>
        </div>
    </div>
</div>
<div class="pt-3">
    <div class="container-fluid">
        
        @if ($errors->any())
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

                    <form action="{{url('/satuan/add')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="namasatuan" class="form-label">Input Nama Satuan</label>
                            <input type="text" value="{{old('namasatuan')}}" class="form-control"
                                id="exampleInputSatuan" name="namasatuan">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class='btn btn-warning ml-3' href='{{url("satuan/list")}}'>Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
