<!-- Modal -->
<div class="modal fade show" id="modal-uploadbukti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('transaksi-pulsa.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="gambar">Bukti Pembayaran</label>
                    <input type="file" class="form-control" name="gambar" required accept="image/*">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>

    </div>
    </div>
</div>
<script>
    $("#modal-uploadbukti").modal('show');
        $.fn.modal.Constructor.prototype._enforceFocus = function() {
            $(document).off('focusin.bs.modal').on('focusin.bs.modal');
        };
</script>

