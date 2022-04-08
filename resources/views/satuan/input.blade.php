@extends('welcome')

@section('main')
<div class="row">
    <div class="col-md-8 offest-sm-2">
        <h3 class="display-8">Input Nama Satuan</h3>
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

<form action="{{url('/satuan/add')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="namasatuan" class="form-label">Nama Satuan</label>
        <input type="text" value="{{old('namasatuan')}}" class="form-control" id="exampleInputSatuan" name="namasatuan">
        <div class="form-text">Silahkan Input Satuan</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class='btn btn-warning ml-3' href='{{url("satuan/list")}}'>Cancel</a>
</form>

@endsection
