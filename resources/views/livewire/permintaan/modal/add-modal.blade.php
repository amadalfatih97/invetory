<div class="modal fade addModal" role="dialog" wire:ignore.self tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Permintaan Barang</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div> 
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-3">
                                <form wire:submit.prevent="save">
                                    @csrf
                                    {{-- start add item --}}
                                    <div class="mb-3">
                                        <label for="tanggalkeluar" class="form-label">Tanggal Keluar</label>
                                        <input type="text" id="picker" name="tanggalkeluar" wire:model="tglkeluar"
                                            value="{{date('Y-m-d')}}" class="form-control" required onchange="this.dispatchEvent(new InputEvent('input'))">
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12">
                                                <label for="kodebarang" class="form-label">Nama Barang</label>
                                                <select
                                                    class="form-select select-barang {{ $errors->get('kodebarang') ? 'is-invalid'  : ''}}"
                                                    name="kodebarang" aria-label="Default select example" id="select-barang"
                                                    required>
                                                    <option value="">Pilih Barang</option>
                                                    @foreach ($barangs as $item)
                                                    <option value="{{$item->kode}}" >{{$item->namabarang}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <label for="stock" class="form-label">Ready</label>
                                                <input type="text" name="stock" readonly class="form-control stok-ready"
                                                    id="stok-ready">
                                                <input type="text" hidden name="namabarang" id="namabarang">
                                                <input type="text" hidden name="satuan" id="satuan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="qty" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" min="1" max="0" id="input-qty" name="qty" required>
                                        <input type="text" name="" value="1" wire:model="kodebrg" id="">
                                        <input type="text" name="" value="2" wire:model="kodebrg" id="">
                                        <input type="text" name="" value="3" wire:model="kodebrg" id="">
                                        <input type="text" name="" value="4" wire:model="kodebrg" id="">
                                        
                                    </div>
                                    <button type="button" disabled class="btn btn-primary" id="add">Tambah</button>
                                    <button type="button" class='btn btn-warning ml-3' data-bs-dismiss="modal" >Cancel</button>
                                    {{-- end add item --}}
                                   
                                    <div class="my-3" id=" show-items">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="rowitem">
                                                <tr>
                                                    <th colspan="4">Item Kosong</th>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" disabled class='btn btn-success ml-3' id='submit'>Submit</button>
                                    {{-- <button type="button" class='btn btn-danger ml-3' id="clear-storage">Clear</button> --}}
                                </form>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>