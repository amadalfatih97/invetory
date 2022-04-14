@extends('master')

@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Form Elements
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i>Input Error!</h4>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- /.box -->
                <!-- general form elements disabled -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Data</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="/satuan/update/{{$satuan->id}}" method="post">
                            @method('PATCH')
                            @csrf
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama Satuan</label>
                                <input value="{{old('namasatuan',$satuan->namasatuan)}}" type="text"
                                    class="form-control" placeholder="Enter ..." name="namasatuan">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class='btn btn-warning ml-3' href='{{url("satuan/list")}}'>Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </section>
</div>


{{-- <div class="row">
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
        <input value="{{old('namasatuan',$satuan->namasatuan)}}" type="text" class="form-control"
            id="exampleInputSatuan" name="namasatuan">
        <div class="form-text">Silahkan Input Satuan</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class='btn btn-warning ml-3' href='{{url("satuan/list")}}'>Cancel</a>
</form> --}}

@endsection
