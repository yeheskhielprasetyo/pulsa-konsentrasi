<!-- Modal -->
<div class="modal fade show" id="modal-editoperator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Operator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('operator.update', [$data->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nama Operator</label>
                    <input type="text" class="form-control" id="recipient-name"  name="nama_operator" required value="{{$data->nama_operator}}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Stock</label>
                        <input type="number" class="form-control" id="recipient-name"  name="stock" required value="{{$data->stock}}">
                    </div>
                    <div class="form-group">
                        <label for="id_pegawai ">Harga</label>
                        <select class="form-control" id="editharga" name="harga" required  style="color: #8d827f">
                        <option value="">- Pilih Harga -</option>
                        @foreach ($harga as $hargas)
                            @if ($hargas->id == $data->id_harga)
                            <option selected value="{{$hargas->id}}">{{$hargas->harga}}</option>
                            @else
                            <option value="{{$hargas->id}}">{{$hargas->harga}}</option>
                            @endif
                        @endforeach
                        </select>
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

<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
<script>
    $('#editharga').chosen({ width: '100%' });
</script>

<script>
    $("#modal-editoperator").modal('show');
        $.fn.modal.Constructor.prototype._enforceFocus = function() {
            $(document).off('focusin.bs.modal').on('focusin.bs.modal');
        };
</script>
