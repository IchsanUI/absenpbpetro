<div>
    <!-- Tombol untuk menampilkan modal -->
    <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#myModal">
        Tambah Atlit +
    </button>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Atlit</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" wire:model="nama">
                        </div>
                        <div class="form-group">
                            <label for="namaPanggilan">Nama Panggilan</label>
                            <input type="text" class="form-control" id="namaPanggilan" wire:model="namaPanggilan">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-warning" wire:click="tambahData">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>
