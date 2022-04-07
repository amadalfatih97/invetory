@extends('welcome')

@section('main')
<a href="{{url('satuan/add')}}" class="btn btn-success mb-1">input data</a>
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
                            <a class="btn btn-info"  href="/satuan/{{$data->id}}" >Edit</button>
                            <a class="btn btn-danger" >Hapus</button>
                        </td>

                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection