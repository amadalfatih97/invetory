@extends('welcome')

@section('main')
<div class="row">
    <div class="col-md-8 offest-sm-2">
        <h3 class="display-8">Input Nama Satuan</h3>
    </div>
</div>
<form action="{{url('/satuan/add')}}" method="post">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Satuan</label>
    <input type="text" class="form-control" id="exampleInputSatuan" name="namasatuan">
    <div class="form-text">Silahkan Input Satuan</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection