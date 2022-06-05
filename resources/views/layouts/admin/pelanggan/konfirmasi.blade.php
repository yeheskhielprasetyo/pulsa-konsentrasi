<form method="POST" action="{{ route('pelanggan-konfirmasi.konfirmasi', [$data->id])}}">
    @csrf
    <div class="modal fade" id="konfir-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Ingin di Konfirmasi ?</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $("#konfir-modal").modal('show');
</script>
