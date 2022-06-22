<div>
    
    <div class="row">
        <div class="col-md-8 ">
            <a href="{{url('barang/add')}}" class="btn btn-success mb-2">input</a>
        </div>
    
        <div class="col-md-4 ">
            <form >
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="button-addon2" wire:model.debounce.350ms="keyword">
                    <button class="btn btn-outline-secondary" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <table class="table table-striped table-hover">
                    <thead>
                        <th class="no">No</th>
                        <th>Nama</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Ket</th>
                        <th class="action" colspan=2>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($barangs as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->namabarang}}</td>
                            <td>{{$data->namasatuan}}</td>
                            <td>{{$data->stok}}</td>
                            <td>{{$data->ket}}</td>
                            <td>
                                <a class="btn btn-outline-primary"  data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="edit data" href="/barang/{{$data->id}}"><i class="bi bi-pencil-square"></i><span class="hide-to-mobile">Edit</span></a>
                            </td>
                            <td>
                                <form action='{{url("barang/delete/{$data->id}")}}' method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit"><i class="bi bi-trash"></i><span class="hide-to-mobile">Hapus</span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
