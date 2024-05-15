<div>
    <div class="row">
        <div class="col-12">
            <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    PlayStation Rental
    </button>

    <!-- The Modal -->
    <div class="modal" id="myModal" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">PlayStation Rental List</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <label>PlayStation Type</label>
                <input type="text" class="form-control" wire:model='nama' />
            </div>
            <div class="form-group">
                <label>Rental Prices</label>
                <input type="number" class="form-control" wire:model='harga' />
            </div>
            <div class="form-group">
                <button class="btn btn-primary w-100 mt-4" wire:click='simpan'>Simpan</button>
            </div>
        </div>

        </div>
    </div>
    </div>
        </div>
        <div class="col-12">
            <table class="table table-bordered table-hover mt-4">
                <thead>
                    <th>No</th>
                    <th>PS Type</th>
                    <th>Rental price</th>
                    <th>Status</th>
                    <th>Delete?</th>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->nama }}</td>
                    <td>{{ $barang->harga }}</td>
                    <td>
                        <button wire:click="gantistatus('belum', {{ $barang->id }})"
                            class="btn @if($barang->status =='belum') btn-info @else btn-outline-info @endif">Not yet
                        </button>
                        <button wire:click="gantistatus('proses', {{ $barang->id }})"
                            class="btn @if($barang->status =='proses') btn-warning @else btn-outline-warning @endif">Process
                        </button>
                        <button wire:click="gantistatus('selesai', {{ $barang->id }})"
                            class="btn @if($barang->status=='selesai') btn-success @else btn-outline-success @endif">Finished
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger" wire:click="hapus({{ $barang->id }})">Delete</button>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br/>
            Total PS Rental : {{ $belum + $selesai + $proses }}
            <br/>
            Total Belum : {{ $belum }}
            <br/>
            Total Proses : {{ $proses }}
            <br/>
            Total Completed : {{ $selesai }}
        </div>
    </div>
</div>
