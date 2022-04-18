@extends('master')

@section('main')
<div class="row">
    <div class="col-md-8 offest-sm-2">
        <h3 class="display-8">Edit Nama Satuan</h3>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/satuan/update/{{$satuan->id}}" method="post">
    @method('PATCH')
    @csrf
    <div class="mb-3">
        <label for="namasatuan" class="form-label">Nama Satuan</label>
        <input value="{{old('namasatuan',$satuan->namasatuan)}}" type="text" class="form-control" id="exampleInputSatuan"
            name="namasatuan">
        <div class="form-text">Silahkan Input Satuan</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class='btn btn-warning ml-3' href='{{url("satuan/list")}}'>Cancel</a>
</form>

@endsection
