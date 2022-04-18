@extends('master')

@section('main')
<div class="row">
    <div class="col-md-8">
        <a href="{{url('satuan/add')}}" class="btn btn-success mb-1">input</a>
    </div>

    <div class="col-md-4">
        <form action='{{url("satuan/list")}}' method="GET">
            <div class="input-group mb-3">
                <input name="key" type="text" class="form-control" placeholder="Search" aria-label="Search"
                    aria-describedby="button-addon2" value="{{Request::get('key')}}">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>

            </div>
        </form>
    </div>
</div>
@if(session()->get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session()->get('success')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <th>No</th>
                <th>Nama Satuan</th>
                <th colspan=2>Aksi</th>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($satuans as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->namasatuan}}</td>
                    <td>
                        <a class="btn btn-info" href="/satuan/{{$data->id}}">Edit</button>
                    </td>
                    <td>
                        <form action='{{url("satuan/delete/{$data->id}")}}' method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
